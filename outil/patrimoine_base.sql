-- =================================================================
-- Base PATRIMOINE pour le projet 2024
-- Marc LEMERCIER : v1 : le 14 mars 2024
-- Marc LEMERCIER : v2 : le 24 avril 2024
-- Marc LEMERCIER : v3 : le 11 mai 2024
-- =================================================================


-- table banques

create table if not exists banque (
 id integer unsigned not null,
 label varchar(50) unique not null,
 pays varchar(30) not null,
 primary key (id) 
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

-- table personne

create table if not exists personne (
 id integer unsigned not null,
 nom varchar(40) not null,
 prenom varchar(40) unique not null,
 statut integer unsigned not null,
 login varchar(20) not null,
 password varchar(20) not null,
 primary key (id) 
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

-- table des comptes

create table if not exists compte (
 id integer unsigned not null,
 label varchar(40) not null,
 montant float not null,
 banque_id integer unsigned not null,
 personne_id integer unsigned not null, 
 primary key (id),
 foreign key (banque_id) references banque(id),
 foreign key (personne_id) references personne(id)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

-- table des immo

create table if not exists residence (
 id integer unsigned not null,
 label varchar(100) not null,
 ville varchar(50) not null,
 prix float not null,
 personne_id integer unsigned not null,
 primary key (id),
 foreign key (personne_id) references personne(id)  
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

-- =====================================================================================
-- ------- data
-- =====================================================================================

-- Liste des banques

insert into banque values (1, 'Crédit Agricole', 'France');
insert into banque values (2, 'La Banque Postale', 'France');
insert into banque values (3, 'Caisse d''épargne', 'France');
insert into banque values (4, 'Société Générale', 'France');
insert into banque values (5, 'BNP Paribas', 'France');
insert into banque values (6, 'Le Crédit Lyonnais', 'France');
insert into banque values (7, 'CIC', 'France');
insert into banque values (8, 'Crédit Mutuel', 'France');

insert into banque values (11, 'Wells Fargo Bank', 'Etats-Unis');
insert into banque values (12, 'JPMorgan Chase Bank', 'Etats-Unis');
insert into banque values (13, 'Citibank', 'Etats-Unis');
insert into banque values (14, 'Bank of America', 'Etats-Unis');

-- Administrateur

insert into personne values (0, "Le", "Boss", 0, "boss", "secret");


-- =====> BEATRICE

insert into personne values (1001, "PRIOR", "Beatrice", 1, "beatrice", "secret");

insert into compte values (11, 'Compte chèque de Béatrice', 1000.00, 1, 1001);
insert into compte values (12, 'Livret A', 2500.00, 2, 1001);
insert into compte values (13, 'Livret DD', 3500.00, 2, 1001);
insert into compte values (14, 'Livret B', 503500.00, 2, 1001);

insert into residence values (101, 'Appartement Marie Curie', 'Troyes', 90000.00, 1001);
insert into residence values (102, 'Maison Promenade des Anglais', 'Nice', 400000.00, 1001);


-- =====> TOBIAS

insert into personne values (1002, "EATON", "Tobias", 1, "tobias", "secret");

insert into compte values (21, 'Compte chèque de Tobias', 1234.00, 7, 1002);

insert into residence values (201, 'Appartement Curie de Troyes', 'Troyes', 200000.00, 1002);
insert into residence values (202, 'Parking rue Daulenay', 'Troyes', 10000.00, 1002);
insert into residence values (203, 'Maison de la rue Voltaire', 'Troyes', 500000.00, 1002);
insert into residence values (204, 'Appartement de la rue des 15-20', 'Troyes', 100000.00, 1002);


-- =====> JEANINE

insert into personne values (1003, "MATTHEWS", "Jeanine", 1, "jeanine", "secret");

insert into compte values (31, 'Compte chèque de Jeanine', 154800, 13, 1003);

insert into residence values (301, 'Appartement Ambroise Petit', 'Reims', 400000.00, 1003);
insert into residence values (303, 'Maison de la rue Tournebonneau', 'Reims', 900000, 1003);
insert into residence values (304, 'Appartement de la rue Chanteraine', 'Reims', 275000.00, 1003);


-- =====> CALEB

insert into personne values (1004, "PRIOR", "Caleb", 1, "caleb", "secret");
insert into residence values (401, 'Cabane au fond du jardin', 'Rôme', 1000, 1004);


-- =====> TAYLOR
insert into personne values (1007,'SWIFT','Taylor', 1, 'taylor', 'secret');

insert into compte values (71, 'The Eras Tour', 10000000, 11, 1007);
insert into compte values (72, 'Red Tour', 50000000, 12, 1007);
insert into compte values (73, 'Reputation Stadium Tour', 187000000, 13, 1007);

insert into residence values (701, 'Appartement Penthouse de Music Row', 'Nashville', 2000000, 1007); 
insert into residence values (702, 'Domaine de Beverly Hills', 'Los Angeles',  3550000, 1007);
insert into residence values (703, 'Northumberland Estate', 'Nashville', 2500000, 1007);
insert into residence values (704, 'Bungalow à Los Angeles', 'Los Angeles', 1780000, 1007);
insert into residence values (705, 'Manoir Watch Hill Seaside Estate', 'Rhode Island', 17750000, 1007);
insert into residence values (706, 'Duplex à NY (Loft de Tribeca)', 'New York',  20000000, 1007);
insert into residence values (707, 'Manoir de Beverly Hills', 'Berverly Hills', 25000000, 1007);
insert into residence values (708, 'Maison Cornelia Street', 'New York', 9750000, 1007);

