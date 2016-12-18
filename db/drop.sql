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
 * db/drop.sql
 *
 * Author:  trigger
 * Created: Dec 18, 2016
 *
 * Delete database schema
 */


DROP TABLE IF EXISTS Horaire_Cours;
DROP TABLE IF EXISTS Cours;
DROP TABLE IF EXISTS Horaire;
DROP TABLE IF EXISTS Matiere;
DROP TABLE IF EXISTS Inscrire;
DROP TABLE IF EXISTS Classe;
DROP TABLE IF EXISTS Enseignant;
DROP TABLE IF EXISTS Information;
DROP TABLE IF EXISTS Serie;
DROP TABLE IF EXISTS Niveau;
DROP TABLE IF EXISTS T_option;
DROP TABLE IF EXISTS Censeur;
DROP TABLE IF EXISTS Livre;
DROP TABLE IF EXISTS Cahier;
DROP TABLE IF EXISTS Administrateur;
DROP TABLE IF EXISTS Parrainer;
DROP TABLE IF EXISTS Parent;
DROP TABLE IF EXISTS Compte;
DROP TABLE IF EXISTS Type_Compte;
DROP TABLE IF EXISTS Eleve;
DROP TABLE IF EXISTS Fiche;
DROP TABLE IF EXISTS Parametre;

