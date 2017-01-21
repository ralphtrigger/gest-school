delete from Horaire;
delete from Enseignant;

insert into Horaire values
(1, '07h30', '08h25'),
(2, '08h25', '09h20'),
(3, '09h25', '10h15'),
(4, '10h30', '11h25'),
(5, '11h25', '12h20'),
(6, '12h50', '13h45'),
(7, '13h45', '14h40'),
(8, '14h40', '15h35'),
(9, '15h35', '16h30');

insert into Enseignant (id_ens, nom_ens, prenom_ens) values 
(1, 'John', 'Doe'),
(2, 'Jeanne', 'Doe'),
(3, 'Cosinus', 'Acer'),
(4, 'John I', 'Doe'),
(5, 'John II', 'Doe'),
(6, 'John III', 'Doe'),
(7, 'John IV', 'Doe'),
(8, 'John V', 'Doe'),
(9, 'John VI', 'Doe'),
(10, 'John VII', 'Doe');
