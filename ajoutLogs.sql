CREATE TABLE IF NOT EXISTS logs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    VIS_MATRICULE VARCHAR(50) NOT NULL,
    date DATETIME,
    action TEXT,
    FOREIGN KEY (VIS_MATRICULE) REFERENCES visiteur(VIS_MATRICULE)
)


-- Jeux de test

INSERT INTO `logs` (`id`, `VIS_MATRICULE`, `date`, `action`) VALUES (NULL, 'zzz', '2022-01-11 10:30:21', 'Login');
INSERT INTO `logs` (`id`, `VIS_MATRICULE`, `date`, `action`) VALUES (NULL, 'zzz', '2022-02-11 10:30:21', 'Login');
INSERT INTO `logs` (`id`, `VIS_MATRICULE`, `date`, `action`) VALUES (NULL, 'zzz', '2022-03-11 10:30:21', 'Login');
INSERT INTO `logs` (`id`, `VIS_MATRICULE`, `date`, `action`) VALUES (NULL, 'zzz', '2022-04-11 10:30:21', 'Login');
INSERT INTO `logs` (`id`, `VIS_MATRICULE`, `date`, `action`) VALUES (NULL, 'zzz', '2022-05-11 10:30:21', 'Login');
INSERT INTO `logs` (`id`, `VIS_MATRICULE`, `date`, `action`) VALUES (NULL, 'zzz', '2022-06-11 10:30:21', 'Login');
INSERT INTO `logs` (`id`, `VIS_MATRICULE`, `date`, `action`) VALUES (NULL, 'zzz', '2022-07-11 10:30:21', 'Login');
INSERT INTO `logs` (`id`, `VIS_MATRICULE`, `date`, `action`) VALUES (NULL, 'zzz', '2022-08-11 10:30:21', 'Login');

INSERT INTO `logs` (`id`, `VIS_MATRICULE`, `date`, `action`) VALUES (NULL, 'a17', '2022-01-11 10:30:21', 'Login');
INSERT INTO `logs` (`id`, `VIS_MATRICULE`, `date`, `action`) VALUES (NULL, 'a17', '2022-02-11 10:30:21', 'Login');
INSERT INTO `logs` (`id`, `VIS_MATRICULE`, `date`, `action`) VALUES (NULL, 'a17', '2022-05-11 10:30:21', 'Login');
