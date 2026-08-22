/**
 * video-r2-upload.js
 *
 * Helpers for the "Video R2 Upload" admin page:
 *  - uploadFileToR2()      presigned direct-to-R2 upload with a real progress callback
 *  - saveUploadRecord()    POST the resulting public URL to be saved
 *  - handleMultiUpload()   wire a multi-select <input type="file"> to upload + save
 *                          each file one at a time, each with its own progress row
 *  - copyToClipboard()     copy a text input's value, used by the Copy buttons
 *
 * Requires jQuery (already loaded by the backend layout) and
 * <meta name="csrf-token" content="{{ csrf_token() }}"> in <head>.
 */

const VIDEO_R2_UPLOAD_BASE = '/admin/video-r2-upload';

/**
 * Ask Laravel for a presigned PUT URL, then PUT the file straight to R2.
 * Uses XMLHttpRequest (not fetch) — only XHR exposes upload progress.
 *
 * @param {File} file
 * @param {(percent:number)=>void} onProgress
 * @returns {Promise<string>} public R2 URL of the uploaded file
 */
async function uploadFileToR2(file, onProgress) {
    const presignRes = await fetch(`${VIDEO_R2_UPLOAD_BASE}/presign-upload`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify({ filename: file.name, mime: file.type || 'application/octet-stream' }),
    });

    if (!presignRes.ok) {
        throw new Error('Could not get an upload URL from the server.');
    }

    const { upload_url, headers, public_url } = await presignRes.json();

    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.open('PUT', upload_url, true);

        Object.entries(headers || {}).forEach(([key, value]) => {
            xhr.setRequestHeader(key, Array.isArray(value) ? value[0] : value);
        });

        xhr.upload.onprogress = (e) => {
            if (e.lengthComputable) {
                onProgress(Math.round((e.loaded / e.total) * 100));
            }
        };

        xhr.onload = () => {
            (xhr.status >= 200 && xhr.status < 300)
                ? resolve(public_url)
                : reject(new Error(`Upload to R2 failed (status ${xhr.status})`));
        };
        xhr.onerror = () => reject(new Error('Network error while uploading to R2.'));

        xhr.send(file);
    });
}

/** Persist an uploaded file's public URL as a record. */
async function saveUploadRecord(publicUrl) {
    const res = await fetch(`${VIDEO_R2_UPLOAD_BASE}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify({ url: publicUrl }),
    });
    if (!res.ok) throw new Error('Upload succeeded but saving the record failed.');
    return res.json();
}

function escapeHtml(str) {
    return (str ?? '').replace(/[&<>"']/g, (c) => ({
        '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;',
    }[c]));
}

/**
 * Wire a multi-select file input: each chosen file gets its own progress row,
 * uploads to R2, gets saved, then (once every file is done) the page reloads
 * so the table picks up the new rows.
 *
 * @param {Object} opts
 * @param {string} opts.inputId   id of the <input type="file" multiple>
 * @param {string} opts.queueId   id of the container the progress rows are appended to
 */
function handleMultiUpload({ inputId, queueId }) {
    $('#' + inputId).on('change', async function () {
        const files = Array.from(this.files);
        this.value = ''; // allow re-selecting the same file(s) later
        if (!files.length) return;

        for (const file of files) {
            await uploadOneFile(file, queueId);
        }

        location.reload();
    });
}

async function uploadOneFile(file, queueId) {
    const rowId = 'uploadRow_' + Math.random().toString(36).slice(2);

    $('#' + queueId).append(`
        <div class="upload-row mb-2" id="${rowId}">
            <div class="d-flex justify-content-between">
                <small>${escapeHtml(file.name)}</small>
                <small class="upload-status">0%</small>
            </div>
            <progress value="0" max="100" class="w-100"></progress>
        </div>
    `);

    const $row = $('#' + rowId);
    const $bar = $row.find('progress');
    const $status = $row.find('.upload-status');

    try {
        const publicUrl = await uploadFileToR2(file, (percent) => {
            $bar.val(percent);
            $status.text(percent + '%');
        });

        await saveUploadRecord(publicUrl);

        $status.text('Done');
        $bar.val(100);
    } catch (err) {
        $status.text('Failed').addClass('text-danger');
        $row.append(`<small class="text-danger d-block">${escapeHtml(err.message)}</small>`);
    }
}

/** Copy the value of a text input/element to the clipboard. */
function copyToClipboard(elementId) {
    const el = document.getElementById(elementId);
    if (!el) return;

    const text = 'value' in el ? el.value : el.textContent;
    navigator.clipboard.writeText(text).then(() => {
        const $btn = $(`[onclick="copyToClipboard('${elementId}')"]`);
        const original = $btn.text();
        $btn.text('Copied!');
        setTimeout(() => $btn.text(original), 1500);
    });
}