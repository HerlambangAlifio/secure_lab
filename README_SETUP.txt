README - Setup Secure Lab (XAMPP Windows / LAMP)

1) Copy folder secure_lab ke htdocs (XAMPP) atau www (Linux).
2) Start Apache + MySQL (pastikan MySQL di port 3307 jika menggunakan XAMPP config kamu).
3) Import init_db.sql into MySQL (phpMyAdmin or CLI):
   mysql -u root -p < init_db.sql
4) Edit config.php if MySQL username/password differ.
5) Create initial admin user:
   - Use register.php to create a user, then set role to 'admin' in DB:
     UPDATE users SET role='admin' WHERE username='youradminusername';
   OR insert via phpMyAdmin.
6) (Optional) Put uploads/.htaccess to block PHP execution if using Apache.
7) Always run on a local VM snapshot; do not expose to internet.
8) Use vulnerable/* only for lab demonstration. Prefer safe/* pages for secure examples.

Ethics: only test on this local environment. Do not attempt attacks on real systems.
