#!/usr/bin/env bash
set -e

echo "Booting Laravel container..."

# Cache config/routes for production performance.
# Safe to run every boot — these are regenerated from source, not stateful.
php artisan config:cache || true
php artisan route:cache || true

# Run pending migrations only. Laravel tracks applied migrations in the
# `migrations` table, so this is idempotent — it will NOT re-run
# migrations that already applied, and will NOT error if there's
# nothing new to migrate.
#
# IMPORTANT: this does NOT reseed on every boot. Seeding is one-time —
# run it manually via `railway run php artisan db:seed --force` when
# you actually need it, not on every deploy.
#
# We don't `set -e` around this specific command's failure taking down
# the whole container: if a migration genuinely fails (e.g. schema drift
# from a manually-imported SQL dump), we log it and still start the web
# server, so the app stays reachable for debugging instead of crash-looping.
echo "Running database migrations..."
php artisan migrate --force || echo "WARNING: migration step failed — check logs above. Continuing boot anyway."

echo "Starting web server..."
exec "$@"
