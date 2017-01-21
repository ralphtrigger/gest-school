/* 
 * Copyright (C) 2016 trigger
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * db/structure.sql
 *
 * Author:  trigger
 * Created: Dec 17, 2016
 *
 * Creation of database schema
 */
 
-- Creation of tables

-- Fiche
CREATE TABLE IF NOT EXISTS Fiche (
    numero_fiche INTEGER auto_increment,
    annee VARCHAR(9),
    date_demande DATE NOT NULL,
    date_paiement DATE NOT NULL,
    delai_paiement DATE NOT NULL,
    numero_ordre INTEGER NOT NULL,
    CONSTRAINT pk_fiche PRIMARY KEY (numero_fiche)
);

-- Horaire
CREATE TABLE IF NOT EXISTS Horaire (
    id_horaire INTEGER auto_increment,
    heure_debut CHAR(5) NOT NULL,
    heure_fin CHAR(5) NOT NULL,
    CONSTRAINT pk_horaire PRIMARY KEY (id_horaire)
);

-- Cahier
CREATE TABLE IF NOT EXISTS Cahier (
    id_cahier INTEGER auto_increment,
    nbre_pages INTEGER NOT NULL,
    format VARCHAR(100),
    CONSTRAINT pk_cahier PRIMARY KEY (id_cahier)
);

-- Livre
CREATE TABLE IF NOT EXISTS Livre (
    id_liv INTEGER auto_increment,
    titre_liv VARCHAR(255) NOT NULL,
    auteur_liv VARCHAR(255) NOT NULL,
    editeur_liv VARCHAR(255) NOT NULL,
    CONSTRAINT pk_livre PRIMARY KEY (id_liv)
);

-- Niveau
CREATE TABLE IF NOT EXISTS Niveau (
    id_niv INTEGER NOT NULL auto_increment,
    code_niv VARCHAR(4) NOT NULL,
    lib_niv VARCHAR(50) NOT NULL,
    CONSTRAINT un_niv UNIQUE (code_niv),
    CONSTRAINT pk_niv PRIMARY KEY (id_niv)
);

-- Serie
CREATE TABLE IF NOT EXISTS Serie (
    code_serie VARCHAR(10),
    lib_serie VARCHAR(50) NOT NULL,
    CONSTRAINT un_serie UNIQUE (lib_serie),
    CONSTRAINT pk_serie PRIMARY KEY (code_serie)
);

-- Option
CREATE TABLE IF NOT EXISTS T_option (
    code_opt VARCHAR(4),
    lib_opt VARCHAR(50) NOT NULL,
    CONSTRAINT un_option UNIQUE (lib_opt),
    CONSTRAINT pk_opt PRIMARY KEY (code_opt)
);

-- Matiere
CREATE TABLE IF NOT EXISTS Matiere (
    id_mat INTEGER auto_increment,
    code_mat VARCHAR(50) NOT NULL,
    lib_mat VARCHAR(50),
    CONSTRAINT un_mat UNIQUE (lib_mat),
    CONSTRAINT pk_mat PRIMARY KEY (id_mat)
);

-- Type de compte
CREATE TABLE IF NOT EXISTS Type_Compte (
    id_type_cpt INTEGER auto_increment,
    lib_type_cpt VARCHAR(20) NOT NULL,
    CONSTRAINT un_type_cpt UNIQUE (lib_type_cpt),
    CONSTRAINT pk_type_cpt PRIMARY KEY (id_type_cpt)
);

-- Compte
CREATE TABLE IF NOT EXISTS Compte (
    id_compte INTEGER auto_increment,
    identifiant VARCHAR(255) NOT NULL,
    motdepasse VARCHAR(255) NOT NULL,
    id_type_cpt INTEGER NOT NULL,
    CONSTRAINT pk_compte PRIMARY KEY (id_compte),
    CONSTRAINT fk_compte_type_cpt FOREIGN KEY (id_type_cpt) 
        REFERENCES Type_Compte(id_type_cpt)
            ON DELETE CASCADE ON UPDATE CASCADE
);

-- Administrateur
 CREATE TABLE IF NOT EXISTS Administrateur (
    id_admin INTEGER auto_increment,
    nom_admin VARCHAR(100) NOT NULL,
    prenom_admin VARCHAR(100) NOT NULL,
    cni_admin VARCHAR(10),
    id_compte INTEGER NOT NULL,
    CONSTRAINT pk_admin PRIMARY KEY(id_admin),
    CONSTRAINT fk_admin_compte FOREIGN KEY (id_compte) 
        REFERENCES Compte(id_compte)
            ON DELETE CASCADE ON UPDATE CASCADE
 );

-- Censeur
CREATE TABLE IF NOT EXISTS Censeur (
    id_censeur INTEGER auto_increment,
    nom_censeur VARCHAR(100) NOT NULL,
    prenom_censeur VARCHAR(100),
    id_compte INTEGER NOT NULL,
    CONSTRAINT pk_censeur PRIMARY KEY (id_censeur),
    CONSTRAINT fk_censeur_cpt FOREIGN KEY (id_compte)
        REFERENCES Compte(id_compte)
            ON DELETE CASCADE ON UPDATE CASCADE
);

-- Classe
CREATE TABLE IF NOT EXISTS Classe (
    code_cl VARCHAR(10),
    code_serie VARCHAR(10),
    id_niv INTEGER NOT NULL,
    code_opt VARCHAR(4),
    id_censeur INTEGER,
    CONSTRAINT pk_cl PRIMARY KEY (code_cl),
    CONSTRAINT fk_cl_serie FOREIGN KEY (code_serie)
        REFERENCES Serie(code_serie),
    CONSTRAINT fk_cl_niv FOREIGN KEY (id_niv)
        REFERENCES Niveau(id_niv),
    CONSTRAINT fk_cl_opt FOREIGN KEY (code_opt)
        REFERENCES T_option(code_opt),
    CONSTRAINT fk_cl_censeur FOREIGN KEY (id_censeur)
        REFERENCES Censeur(id_censeur)
);

-- Enseignant
CREATE TABLE IF NOT EXISTS Enseignant (
    id_ens INTEGER auto_increment,
    nom_ens VARCHAR(100) NOT NULL,
    prenom_ens VARCHAR(100),
    id_compte INTEGER, /*NOT NULL,*/
    CONSTRAINT pk_ens PRIMARY KEY (id_ens),
    CONSTRAINT fk_ens_cpt FOREIGN KEY (id_compte)
        REFERENCES Compte(id_compte)
            ON DELETE CASCADE ON UPDATE CASCADE
);

-- Information
CREATE TABLE IF NOT EXISTS Information (
    id_info INTEGER auto_increment,
    resume_cours VARCHAR(3000),
    id_liv1 INTEGER NOT NULL,
    id_liv2 INTEGER,
    id_liv3 INTEGER,
    id_cahier1 INTEGER NOT NULL,
    id_cahier2 INTEGER,
    id_cahier3 INTEGER,
    CONSTRAINT pk_info PRIMARY KEY (id_info),
    CONSTRAINT fk_info_livre1 FOREIGN KEY (id_liv1)
        REFERENCES Livre(id_liv)
            ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_info_livre2 FOREIGN KEY (id_liv2)
        REFERENCES Livre(id_liv)
            ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_info_livre3 FOREIGN KEY (id_liv3)
        REFERENCES Livre(id_liv)
            ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_info_cahier1 FOREIGN KEY (id_cahier1)
        REFERENCES Cahier(id_cahier)
            ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_info_cahier2 FOREIGN KEY (id_cahier2)
        REFERENCES Cahier(id_cahier)
            ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_info_cahier3 FOREIGN KEY (id_cahier3)
        REFERENCES Cahier(id_cahier)
            ON DELETE CASCADE ON UPDATE CASCADE
);

-- Cours
CREATE TABLE IF NOT EXISTS Cours (
    id_cours INTEGER auto_increment,
    jour VARCHAR(10) NOT NULL,
    id_mat INTEGER NOT NULL,
    code_cl VARCHAR(10) NOT NULL,
    id_ens INTEGER NOT NULL,
    id_info INTEGER,
    CONSTRAINT pk_cours PRIMARY KEY (id_cours),
    CONSTRAINT fk_cours_mat FOREIGN KEY (id_mat)
        REFERENCES Matiere(id_mat) 
            ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_cours_cl FOREIGN KEY (code_cl)
        REFERENCES Classe(code_cl) 
            ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_cours_ens FOREIGN KEY (id_ens)
        REFERENCES Enseignant(id_ens) 
            ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_cours_info FOREIGN KEY (id_info)
        REFERENCES Information(id_info) 
            on update cascade
);

-- Eleve
CREATE TABLE IF NOT EXISTS Eleve (
    id_el INTEGER auto_increment,
    matricule_el CHAR(8) NOT NULL,
    nom_el VARCHAR(100) NOT NULL,
    prenom_el VARCHAR(100),
    date_naiss_el DATE,
    sexe_el CHAR(1) NOT NULL,
    numero_fiche INTEGER DEFAULT NULL,
    CONSTRAINT un_el UNIQUE (matricule_el),
    CONSTRAINT pk_el PRIMARY KEY (id_el),
    CONSTRAINT fk_el_fiche FOREIGN KEY (numero_fiche)
        REFERENCES Fiche(numero_fiche)
            ON DELETE SET NULL ON UPDATE CASCADE
);

-- Horaire_Cours
CREATE TABLE IF NOT EXISTS Horaire_Cours (
    id_cours INTEGER,
    id_horaire INTEGER,
    CONSTRAINT pk_horaire_cours PRIMARY KEY (id_cours, id_horaire),
    CONSTRAINT fk_hc_cours FOREIGN KEY (id_cours)
        REFERENCES Cours(id_cours)
            ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_hc_horaire FOREIGN KEY (id_horaire)
        REFERENCES Horaire(id_horaire)
            ON DELETE CASCADE ON UPDATE CASCADE
);

-- Inscrire
CREATE TABLE IF NOT EXISTS Inscrire (
    id_el INTEGER,
    code_cl VARCHAR(10),
    statut_insc ENUM('EN ATTENTE', 'CONFIRMEE'),
    CONSTRAINT pk_insc PRIMARY KEY (id_el, code_cl),
    CONSTRAINT fk_insc_el FOREIGN KEY (id_el)
        REFERENCES Eleve(id_el)
            ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_insc_cl FOREIGN KEY (code_cl)
        REFERENCES Classe(code_cl)
            ON DELETE CASCADE ON UPDATE CASCADE
);

-- Parametre
CREATE TABLE IF NOT EXISTS Parametre (
    id_param INTEGER auto_increment,
    -- duree de validite d'une fiche
    duree_fiche INTEGER NOT NULL,
    -- nombre de personnes à servir par jour
    nbre_pers_jr INTEGER NOT NULL,
    -- duree d'une plage horaire
    duree_plg_h INTEGER NOT NULL,
    -- inscription ouverte ou non
    inscription boolean NOT NULL,
    CONSTRAINT pk_parametre PRIMARY KEY (id_param)
);

-- Parent
CREATE TABLE IF NOT EXISTS Parent (
    id_parent INTEGER auto_increment,
    nom_parent VARCHAR(100) NOT NULL,
    prenom_parent VARCHAR(100),
    numtel_parent VARCHAR(255) NOT NULL,
    email_parent VARCHAR(255) NOT NULL,
    type_parent VARCHAR(255) NOT NULL,
    id_compte INTEGER NOT NULL,
    CONSTRAINT pk_parent PRIMARY KEY (id_parent),
    CONSTRAINT fk_parent_cpt FOREIGN KEY (id_compte)
        REFERENCES Compte(id_compte)
            ON DELETE CASCADE ON UPDATE CASCADE
);

-- Parrainer
CREATE TABLE IF NOT EXISTS Parrainer (
    id_el INTEGER,
    id_parent INTEGER,
    CONSTRAINT pk_parrainer PRIMARY KEY(id_el, id_parent),
    CONSTRAINT fk_parrainer_el FOREIGN KEY (id_el)
        REFERENCES Eleve(id_el)
            ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_parrainer_parent FOREIGN KEY (id_parent)
        REFERENCES Parent(id_parent)
            ON DELETE CASCADE ON UPDATE CASCADE
);
