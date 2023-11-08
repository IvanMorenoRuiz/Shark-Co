

-- Insertar datos en la tabla tbl_departamento
INSERT INTO shakandco.tbl_departamento (nombre_dept, codigo_dept) VALUES
 ('Departamento GM (Grado Medio)', 1),
 ('Departamento GS (Grado Superior)', 2);



-- Insertar datos en la tabla tbl_profesor
INSERT INTO shakandco.tbl_profesor (dni_prof, nombre_prof, contrasena_prof, apellido_prof, email_prof, dept_prof) VALUES
  (1, 'Agnes', '$2y$10$lY1Gw1s2WDu/CFLRstKHT./KbJ9G5KLRRMuz1r1apnINxpuRzeey6', 'Plans', 'agnes.plans@fje.edu', 2),
       (2, 'Alberto', '$2y$10$lY1Gw1s2WDu/CFLRstKHT./KbJ9G5KLRRMuz1r1apnINxpuRzeey6', 'De Santos', 'alberto.santos@fje.edu', 2),
       (3, 'Fatima', '$2y$10$lY1Gw1s2WDu/CFLRstKHT./KbJ9G5KLRRMuz1r1apnINxpuRzeey6', 'Martinez', 'fatima.martinez@fje.edu', 2),
       (4, 'Sussana', '$2y$10$lY1Gw1s2WDu/CFLRstKHT./KbJ9G5KLRRMuz1r1apnINxpuRzeey6', 'Del Pozo', 'sussana.pozo@fje.edu', 2);



-- Insertar datos en la tabla tbl_assignatura
INSERT INTO shakandco.tbl_assignatura (codigo_clase, nombre_assignatura, profesor) VALUES
       (12, 'Sintesis', 2),
       (7, 'Desenvolupament Web en Servidor', 2),
       (6, 'Desenvolupaent web en entorn client', 3),
       (9, 'Disseny interficies web', 1),
       (8, 'Servidors aplicacions web', 1),
       (3, 'Programacio OO', 3),
       (4, 'Base de dades', 4);


-- Insertar datos en la tabla tbl_alumno
INSERT INTO shakandco.tbl_alumno (num_matricula, dni_alu, nombre_alu, apellido_alu) VALUES
       (123456789, '123456789A', 'Joan', 'Becerril'),
       (123456788, '123456788B', 'Pol', 'Marc'),
       (123456787, '123456787C', 'Ivan', 'Moreno'),
       (123456786, '123456786D', 'Sergio', 'Callejas'),
       (123456785, '123456785E', 'Luca', 'Lusuardi'),
       (123456784, '123456784F', 'Julia', 'Suarez'),
       (123456783, '123456783G', 'Carla', 'Maldonado'),
       (123456782, '123456782H', 'Wilson', 'Alfredo'),
       (123456781, '123456782I', 'Alberto', 'Bermejo'),
       (123456780, '123456781J', 'Ricard', 'Casals'),
       (123456779, '123456780K', 'Olga', 'Clemente'),
       (123456778, '123456779L', 'Manel', 'Garcia'),
       (123456777, '123456778M', 'Sergio', 'Leon'),
       (123456776, '123456777N', 'Jinquan', 'Lin'),
       (123456775, '123456776O', 'Oscar', 'Lopez'),
       (123456774, '123456775P', 'Eric', 'Molina'),
       (123456773, '123456774Q', 'Ian', 'Romero');



-- Insertar datos en la tabla tbl_alumno_nota_assignatura
INSERT INTO shakandco.tbl_alumno_nota_assignatura (num_matricula, nota_alumno, id_assignatura) VALUES
(123456773, 8.5, 5),
(123456773, 7.2, 3),
(123456773, 7.4, 1),
(123456773, 2.4, 4);
