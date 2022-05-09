CREATE TABLE IF NOT EXISTS logs (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    -- Field VIS_MATRICULE foreign key on vis matricule of table visiteur
    VIS_MATRICULE TEXT NOT NULL,
    date DATE,
    action TEXT
    FOREIGN KEY (VIS_MATRICULE) REFERENCES visiteur(VIS_MATRICULE) }