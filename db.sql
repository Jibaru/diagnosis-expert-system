CREATE TABLE grupo_01_enfermedades.sintomas
(
    codigo varchar(20) PRIMARY KEY,
    nombre varchar(300) NOT NULL
);

CREATE TABLE grupo_01_enfermedades.enfermedades
(
    codigo varchar(20) PRIMARY KEY,
    nombre varchar(300) NOT NULL
);

CREATE TABLE grupo_01_enfermedades.resultados
(
    codigo INTEGER PRIMARY KEY AUTO_INCREMENT,
    codigo_enfermedad VARCHAR
(20) NULL,
    fecha_consulta TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY
(codigo_enfermedad) REFERENCES grupo_01_enfermedades.enfermedades
(codigo)
);

CREATE TABLE grupo_01_enfermedades.consultas
(
    codigo_resultado INTEGER NOT NULL,
    codigo_sintoma VARCHAR(20) NOT NULL,
    FOREIGN KEY (codigo_resultado) REFERENCES grupo_01_enfermedades.resultados (codigo),
    FOREIGN KEY (codigo_sintoma) REFERENCES grupo_01_enfermedades.sintomas (codigo)
);

INSERT INTO grupo_01_enfermedades.sintomas
    (codigo, nombre)
VALUES
    ('s1', 'Fiebre'),
    ('s2', 'Dolores Musculares'),
    ('s3', 'Tos'),
    ('s4', 'Congestión Nasal'),
    ('s5', 'Dolor de garganta'),
    ('s6', 'Escalofríos'),
    ('s7', 'Fatiga'),
    ('s8', 'Dolor de cabeza'),
    ('s9', 'Secreción nasal'),
    ('s10', 'Estornudos'),
    ('s11', 'Diarrea'),
    ('s12', 'Nauseas'),
    ('s13', 'Vómitos'),
    ('s14', 'Pérdida del gusto'),
    ('s15', 'Pérdida del olfato'),
    ('s16', 'Dolor de pecho'),
    ('s17', 'Tos con sangre'),
    ('s18', 'Pérdida de peso'),
    ('s19', 'Falta de apetito'),
    ('s20', 'Tos intensa'),
    ('s21', 'Flema'),
    ('s22', 'Dificultad al tragar'),
    ('s23', 'Dolor de estómago');

INSERT INTO grupo_01_enfermedades.enfermedades
    (codigo, nombre)
VALUES
    ('E01', 'Gripe'),
    ('E02', 'Covid-19'),
    ('E03', 'Tuberculosis'),
    ('E04', 'Amigdalitis'),
    ('E05', 'Infección estomacal');

INSERT INTO grupo_01_enfermedades.resultados
    (codigo, codigo_enfermedad, fecha_consulta)
VALUES
    (1, 'E01', '2022-06-26 17:45:19'),
    (2, 'E02', '2022-06-26 17:45:55'),
    (3, 'E03', '2022-06-26 17:46:30'),
    (4, 'E05', '2022-06-26 17:46:43'),
    (5, 'E04', '2022-06-26 17:47:11'),
    (6, 'E04', '2022-06-26 17:47:42');

INSERT INTO grupo_01_enfermedades.consultas
    (codigo_resultado,codigo_sintoma)
VALUES
    (1, 's1'),
    (1, 's2'),
    (1, 's3'),
    (1, 's4'),
    (1, 's5'),
    (1, 's6'),
    (1, 's7'),
    (1, 's8'),
    (1, 's10'),
    (2, 's1'),
    (2, 's2'),
    (2, 's3'),
    (2, 's4'),
    (2, 's5'),
    (2, 's10'),
    (2, 's11'),
    (2, 's12'),
    (2, 's14'),
    (3, 's1'),
    (3, 's3'),
    (3, 's7'),
    (3, 's16'),
    (3, 's18'),
    (3, 's21'),
    (4, 's23'),
    (5, 's1'),
    (5, 's5'),
    (5, 's8'),
    (5, 's22'),
    (5, 's23'),
    (6, 's1'),
    (6, 's5'),
    (6, 's6'),
    (6, 's22'),
    (6, 's23');