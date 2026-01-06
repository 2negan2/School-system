#!/usr/bin/env bash
set -euo pipefail

# Change this if XAMPP is installed elsewhere
XAMPP_DIR="/c/xampp"
DATA_DIR="$XAMPP_DIR/mysql/data"

TIMESTAMP=$(date +%Y%m%d-%H%M%S)
BACKUP_DIR="/c/xampp-mysql-backup-$TIMESTAMP"

echo "👉 Creating backup at: $BACKUP_DIR"
mkdir -p "$BACKUP_DIR"
cp -r "$DATA_DIR" "$BACKUP_DIR/data"

echo "✅ Backup complete."

echo
echo "👉 Checking for processes using port 3306..."
netstat -ano | grep 3306 || true
echo
echo "If you see a PID above, you can stop it with:"
echo "  taskkill /PID <PID> /F"
echo

echo "👉 Performing safe InnoDB recovery (renaming ib* files)..."

cd "$DATA_DIR"

for f in ibdata1 ib_logfile0 ib_logfile1; do
  if [ -f "$f" ]; then
    mv "$f" "$f.bak-$TIMESTAMP"
    echo "✔ Renamed $f -> $f.bak-$TIMESTAMP"
  else
    echo "ℹ $f not found — skipping"
  fi
done

echo
echo "🎯 Done!"
echo "Now open XAMPP and start MySQL — it will recreate the files."
