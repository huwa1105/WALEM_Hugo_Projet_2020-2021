--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.20
-- Dumped by pg_dump version 13.2

-- Started on 2021-04-11 02:25:29

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA public;


--
-- TOC entry 2154 (class 0 OID 0)
-- Dependencies: 3
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON SCHEMA public IS 'standard public schema';


SET default_tablespace = '';

--
-- TOC entry 185 (class 1259 OID 113058)
-- Name: categorie; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.categorie (
    id_cat integer NOT NULL,
    libelle text NOT NULL,
    image text
);


--
-- TOC entry 186 (class 1259 OID 113075)
-- Name: film; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.film (
    id_film integer NOT NULL,
    nom text NOT NULL,
    description text NOT NULL,
    realisateur text NOT NULL,
    date date NOT NULL,
    categorie integer NOT NULL,
    image text,
    video text
);


--
-- TOC entry 187 (class 1259 OID 113084)
-- Name: utilisateur; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.utilisateur (
    id_user integer NOT NULL,
    nom text NOT NULL,
    prenom text NOT NULL,
    mail text NOT NULL,
    password text NOT NULL,
    admin boolean NOT NULL
);


--
-- TOC entry 188 (class 1259 OID 113100)
-- Name: vue_films_cat; Type: VIEW; Schema: public; Owner: -
--

CREATE VIEW public.vue_films_cat AS
 SELECT film.id_film,
    film.nom,
    film.description,
    film.realisateur,
    film.date,
    film.categorie,
    film.image,
    categorie.id_cat,
    categorie.libelle
   FROM public.film,
    public.categorie
  WHERE (film.categorie = categorie.id_cat);


--
-- TOC entry 2146 (class 0 OID 113058)
-- Dependencies: 185
-- Data for Name: categorie; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.categorie (id_cat, libelle, image) VALUES (1, 'Comédiee', 'comedie.jpg');
INSERT INTO public.categorie (id_cat, libelle, image) VALUES (2, 'Drame', 'drame.jpg');
INSERT INTO public.categorie (id_cat, libelle, image) VALUES (3, 'Fantastique', 'fantastique.jpg');
INSERT INTO public.categorie (id_cat, libelle, image) VALUES (4, 'Science-fiction', 'science-fiction.jpg');
INSERT INTO public.categorie (id_cat, libelle, image) VALUES (5, 'Horreur', 'horreur.jpg');
INSERT INTO public.categorie (id_cat, libelle, image) VALUES (6, 'Policier', 'policier.jpg');
INSERT INTO public.categorie (id_cat, libelle, image) VALUES (7, 'Thriller', 'thriller.jpg');
INSERT INTO public.categorie (id_cat, libelle, image) VALUES (8, 'Aventure', 'aventure.jpg');
INSERT INTO public.categorie (id_cat, libelle, image) VALUES (9, 'Histoire', 'histoire.jpg');
INSERT INTO public.categorie (id_cat, libelle, image) VALUES (10, 'Action', 'action.jpg');


--
-- TOC entry 2147 (class 0 OID 113075)
-- Dependencies: 186
-- Data for Name: film; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.film (id_film, nom, description, realisateur, date, categorie, image, video) VALUES (2, 'Raid dingue', 'Raid dingue est un film franco-belge réalisé par Dany Boon, sorti en 2016. Le réalisateur reçoit le premier César du public de l''histoire du cinéma français.', 'Dany Boon', '2016-12-19', 1, 'raiddingue.jpg', 'https://www.youtube.com/watch?v=jJzZ5idFxxY');
INSERT INTO public.film (id_film, nom, description, realisateur, date, categorie, image, video) VALUES (5, 'Les animaux fantastiques', 'Les Animaux fantastiques (Fantastic Beasts and Where to Find Them) est un film fantastique américano-britannique réalisé par David Yates, sorti en 2016. Le scénario est le premier écrit par la romancière J. K. Rowling, auteur des aventures de Harry Potter, et le film et ses suites prévues constituent une « extension du monde des sorciers » pour les personnes ayant eu connaissance de la saga originelle1. Il s''agit d''une œuvre sérielle dérivée, se focalisant sur plusieurs personnages secondaires mentionnés ou présents dans l''histoire de Harry Potter, et débutant soixante-cinq ans plus tôt2.

Il s''agit du premier volet de la série Les Animaux fantastiques et du neuvième film de la franchise du monde des sorciers de J. K. Rowling. Il est suivi par Les Crimes de Grindelwald en 2018.

C''est le seul film adapté du monde des sorciers de J. K. Rowling à avoir reçu un Oscar du cinéma, pour les Meilleurs costumes.', 'David Yates', '2016-11-16', 3, 'animauxfantastiques.jpg', 'https://www.youtube.com/watch?v=jC8xuFcMq20');
INSERT INTO public.film (id_film, nom, description, realisateur, date, categorie, image, video) VALUES (8, 'Us', 'Us ou Nous au Québec est un film d''horreur américain écrit, produit et réalisé par Jordan Peele, sorti en mars 2019.', 'Jordan Peele', '2019-03-20', 7, 'us.jpg', 'https://www.youtube.com/watch?v=lE9Sh0quqZg');
INSERT INTO public.film (id_film, nom, description, realisateur, date, categorie, image, video) VALUES (10, 'Indiana Jones et la Dernière Croisade', 'Indiana Jones et la Dernière Croisade (Indiana Jones and the Last Crusade) est un film d''aventures fantastique américain réalisé par Steven Spielberg, sorti en 1989. Il s''agit du troisième volet de la série de quatre films centrés sur le personnage d''Indiana Jones incarné par Harrison Ford.', 'Steven Spielberg', '1989-10-18', 8, 'indianajonesfontaine.jpg', 'https://www.youtube.com/watch?v=7h6BUqhBMV4');
INSERT INTO public.film (id_film, nom, description, realisateur, date, categorie, image, video) VALUES (6, 'Harry Potter à l''école des sorciers', 'Harry Potter à l''école des sorciers (Harry Potter and the Philosopher''s Stone) est un film fantastique britannico-américain réalisé par Chris Columbus, sorti en 2001. C''est un gros succès du box-office mondial.

Il est adapté du roman du même nom sorti en 1997 de J. K. Rowling, et constitue le premier volet de la série de films Harry Potter. Il est suivi par Harry Potter et la Chambre des secrets en 2002.', 'Chris Columbus', '2001-11-21', 3, 'harrypotter1.jpg', 'https://www.youtube.com/watch?v=ht5T2thYQFk');
INSERT INTO public.film (id_film, nom, description, realisateur, date, categorie, image, video) VALUES (7, 'Escape Game', 'Escape Game ou Jeu d’évasion au Québec (Escape Room) est un thriller psychologique sud-africano-américain réalisé par Adam Robitel, sorti en 2019.', 'Adam Robitel', '2019-02-06', 7, 'escapegame.jpg', 'https://www.youtube.com/watch?v=_Wzj2iNPy7s');
INSERT INTO public.film (id_film, nom, description, realisateur, date, categorie, image, video) VALUES (9, 'Indiana Jones - Les Aventuriers de l''arche perdue', 'Les Aventuriers de l''arche perdue (Raiders of the Lost Ark) est un film d''aventures fantastique américain réalisé par Steven Spielberg et coproduit par George Lucas, sorti en 1981.

À partir de l''an 2000, il est exploité sous le nom Indiana Jones et les Aventuriers de l''arche perduea (Indiana Jones and the Raiders of the Lost Ark).

Premier volet de la saga Indiana Jones (deuxième chronologiquement), le film est nommé neuf fois aux Oscars 1982 et en remporte cinq (dont un spécial pour les effets sonores).

Succès critique et commercial (c''est le film le plus rentable de l''année 1981 et un des plus rentables de tous les temps1), il mène à la réalisation de trois suites : Indiana Jones et le Temple maudit (1984), Indiana Jones et la Dernière Croisade (1989), Indiana Jones et le Royaume du crâne de cristal (2008), à une série télévisée, Les Aventures du jeune Indiana Jones (1992-1996) et à quinze jeux vidéo depuis le début de la franchise.

En 1999, le film est sélectionné par le National Film Registry pour être conservé à la Bibliothèque du Congrès pour son « importance culturelle, historique ou esthétique ».

Pour certains cinéphiles, le personnage d''Indiana Jones est reproduit du personnage de Harry Steele, le héros du film Le Secret des Incas (interprété par Charlton Heston) dont il reprend la tenue (pantalon, blouson, chapeau)2, une source d''inspiration de George Lucas et Steven Spielberg3.', 'Steven Spielberg', '1981-09-16', 8, 'indianajonesarche.jpg', 'https://www.youtube.com/watch?v=liIQREC0X2A');
INSERT INTO public.film (id_film, nom, description, realisateur, date, categorie, image, video) VALUES (19, 'Avenger - L''Ere d''Ultron', 'Avengers : L''Ère d''Ultron (Avengers: Age of Ultron) est un film de super-héros américain écrit et réalisé par Joss Whedon, sorti en 2015. Il est basé sur l''équipe de super-héros tirée des comics Marvel, les Avengers.

Ce film est la suite d''Avengers qui avait aussi été écrit et réalisé par Joss Whedon, sorti en 2012. Il compte comme la onzième étape de l''univers cinématographique Marvel débuté en 2008 (et fait partie de la phase II). Tout comme son prédécesseur, le film rassemble les acteurs des différentes franchises super-héroïques habituellement séparées, parmi lesquels Iron Man / Tony Stark (Robert Downey Jr.), Thor (Chris Hemsworth), Hulk / Bruce Banner (Mark Ruffalo), Captain America / Steve Rogers (Chris Evans), Natasha Romanoff (Scarlett Johansson), Clint Barton (Jeremy Renner) et Nick Fury (Samuel L. Jackson).

Le film a été tourné principalement aux studios de Shepperton dans le comté de Surrey en Angleterre, mais aussi en Corée du Sud, au Bangladesh, dans l''État de New York, dans plusieurs endroits du Royaume-Uni et dans la Vallée d''Aoste en Italie1. Pour le cas de la Corée du Sud, le film a bénéficié du programme d''incitation du Conseil du film coréen qui prend en charge 30 % du coût de production local. Une clause incluse dans le contrat entre Marvel et le gouvernement sud-coréen statue que la Corée du Sud doit être montrée comme un « pays moderne et de haute technologie » sans « aucun aspect négatif »2.

Avengers : L''Ère d''Ultron a reçu des critiques généralement positives et a rapporté plus de 1,4 milliard de dollars dans le monde entier, faisant du film le quatrième plus grand succès cinématographique de 2015 et le huitième plus grand succès cinématographique de tous les temps. Deux suites, Avengers: Infinity War et Avengers: Endgame, réalisées par Anthony et Joe Russo, ont suivi : la première sortie en 2018 et la seconde en 2019, lesquelles ont également toutes deux rencontré un énorme succès international.', 'Joss Whedon', '2015-04-22', 10, 'avenger2.jpg', 'https://www.youtube.com/watch?v=ANbZ-zJ7Ig8');
INSERT INTO public.film (id_film, nom, description, realisateur, date, categorie, image, video) VALUES (14, 'Sinister', 'Sinister ou Sinistre au Québec est un slasher et un film d''horreur américano-canado-britannique réalisé par Scott Derrickson, sorti en 2012.

Le film connait une suite, Sinister 2, sortie en 20151.

Une étude scientifique publiée en 2020, analysant l''augmentation de la fréquence cardiaque des spectateurs pendant le visionnage de 50 classiques du cinéma d''épouvante, a désigné Sinister comme le film d''horreur le plus effrayant de tous les temps2.', 'Scott Derrickson', '2012-11-14', 5, 'sinister.jpg', 'https://www.youtube.com/watch?v=4sfzhzRAceE');
INSERT INTO public.film (id_film, nom, description, realisateur, date, categorie, image, video) VALUES (1, 'Bienvenue chez les Ch''tis', 'Bienvenue chez les Ch''tis est un film français réalisé par Dany Boon, sorti le 20 février 2008 dans le Nord-Pas-de-Calais et dans quelques salles de la Somme, le 27 février dans le reste de la France, en Belgique et en Suisse, un jour après au Luxembourg, et le 25 juillet au Canada.

Deuxième long métrage réalisé par l''humoriste français Dany Boon après La Maison du bonheur (2006), le film raconte les aventures de Philippe Abrams, directeur d''une agence de La Poste dans le Sud de la France qui, par mesure disciplinaire, est muté pour une durée de deux ans à Bergues, dans le Nord-Pas-de-Calais. Pour la première fois, Kad Merad occupe seul le rôle principal d''un film, notamment après plusieurs films de son duo Kad et Olivier.

Bienvenue chez les Ch’tis a rencontré un immense succès auprès du public : à la surprise de ses protagonistes, il a dépassé le nombre d''entrées réalisées par La Grande Vadrouille (1966) et est alors devenu, avec 20 489 303 entrées, le meilleur résultat d''un film français au box-office national, et le deuxième au total, juste derrière Titanic (1998) et les 20 758 841 entrées de son exploitation initialen 1.

En 2009, le film fut nommé au César du meilleur scénario original.', 'Dany Boon', '2008-02-27', 1, 'comedie.jpg', 'https://www.youtube.com/watch?v=OycTfchnopU');
INSERT INTO public.film (id_film, nom, description, realisateur, date, categorie, image, video) VALUES (3, 'Titanic', 'Titanic est un film dramatique américain écrit, produit et réalisé par James Cameron, sorti en 1997.

Intégrant à la fois des aspects historiques et fictionnels, le film est basé sur le récit du naufrage du RMS Titanic et met en vedette Leonardo DiCaprio et Kate Winslet.

Elle raconte l''histoire de deux jeunes passagers du paquebot Titanic en avril 1912. L''un, Rose, est une passagère de première classe qui tente de se suicider pour se libérer des contraintes imposées par son entourage, et le second, Jack, est un vagabond embarqué à la dernière minute en troisième classe pour retourner aux États-Unis. Ils se rencontrent par hasard lors de la tentative de suicide de Rose et vivent une histoire d''amour vite troublée par le naufrage du navire.

Le cadre du film, reconstitution fidèle du naufrage, a été mis au point avec l''aide de deux historiens, Don Lynch et Ken Marschall. Le tournage a nécessité la construction d''une maquette quasi grandeur nature du paquebot, des expéditions sur l''épave et de nombreux effets spéciaux, notamment numériques. Le film a entraîné un regain d''intérêt notable pour le véritable Titanic qui s''est traduit par la publication ou la réédition de nombreux ouvrages sur le sujet.

Le film devient un phénomène culturel à travers le monde et reste pendant une période record de douze ans le plus grand succès de l''histoire du cinéma au box office mondial, avec des recettes aux environs de 1,8 milliard de dollars dans le monde entier. Il tient ce record pendant plus d''une décennie, jusqu''en 2010, lorsque le même réalisateur James Cameron le dépasse avec Avatar.

Il a aussi égalé le record de onze Oscars en 1998, dont ceux du meilleur film et du meilleur réalisateur. En France, le film aura cumulé un total de près de 20,7 millions de spectateurs (21,8 millions d''entrées avec les reprises1), plaçant le film en tête du box-office français de tous les temps2.

Le film revient dans les salles de cinéma le 4 avril 2012, adapté en 3D, à l''occasion du centenaire du naufrage du Titanic.', 'James Cameron', '1998-01-07', 2, 'titanic.jpg', 'https://www.youtube.com/watch?v=zU_3otdj6H8');
INSERT INTO public.film (id_film, nom, description, realisateur, date, categorie, image, video) VALUES (17, '1917', '1917 est un film de guerre britannico-américain réalisé, coécrit et produit par Sam Mendes, sorti en 2019.

Le scénario, inspiré en partie par un récit raconté à Mendes par son grand-père paternel, Alfred Mendes, raconte l''histoire de deux jeunes soldats britanniques qui ont reçu l''ordre de délivrer un message annulant une attaque vouée à l''échec peu après la retraite allemande sur la ligne Hindenburg pendant l''opération Alberich en 1917. Ce message est particulièrement important pour l''un des jeunes soldats dont le frère doit participer à l''attaque imminente. La réalisation du film, donnant l''illusion d''un seul long plan-séquence et d''une action en temps réel est un des points forts du film.

Le film a reçu de nombreuses nominations et a remporté plusieurs prix, dont deux Golden Globes (meilleur réalisateur et meilleur film dramatique) et trois Oscars (meilleure photographie, meilleur mixage de son et meilleurs effets visuels).', 'Sam Mendes', '2020-01-08', 9, '1917.jpg', 'https://www.youtube.com/watch?v=Sj1pb4je5T8');
INSERT INTO public.film (id_film, nom, description, realisateur, date, categorie, image, video) VALUES (4, 'Intouchable', 'Intouchables est un film français réalisé par Olivier Nakache et Éric Toledano, sorti en 2011.

L''histoire est inspirée de la vie de Philippe Pozzo di Borgo (auteur du livre Le Second Souffle en 2001), tétraplégique depuis 1993, et de sa relation avec Abdel Yasmin Sellou, son aide à domicile, dont les rôles sont tenus respectivement par les acteurs François Cluzet et Omar Sy. Le générique de fin indique que 5 % des bénéfices réalisés par le film sont reversés à une association pour les personnes paralysées, Simon de Cyrène1, fondée par Laurent de Cherisey.

Avec 19,44 millions d''entrées2 Intouchables est le deuxième plus gros succès du box office en France, derrière Bienvenue chez les Ch''tis. Il est devenu en 2012 le film français en langue française le plus vu à l''étranger, détrônant ainsi Le Fabuleux Destin d''Amélie Poulain qui détenait le titre depuis près de dix ans3. Intouchables devient aussi le film le plus vu de l''année 2012 dans l''Union européenne, devant Harry Potter et les Reliques de la Mort : Partie 2.

En février 2013, il est le plus grand succès d''un long métrage français à l''international toutes langues confondues, avec 30 millions d''entrées à l''étranger selon Unifrance, dépassant ainsi Taken 24. Il devient également le film français le plus vu au mondeNote 1 avec 51,5 millions d''entrées au total, et des recettes excédant les 425 millions de dollars. Il garde ce record jusqu''en 2014 où Lucy le fait passer en deuxième position5.

Le 10 janvier 2012, Intouchables a battu un record en se classant n° 1 au box office hebdomadaire français pendant neuf semaines consécutives depuis sa sortie, classement qu''il conservera jusqu''à sa dixième semaine. Pour son rôle dans ce long-métrage, Omar Sy décroche le César du meilleur acteur en 2012. Intouchables a été présélectionné pour la nomination du meilleur film en langue étrangère aux Oscars, mais le 10 janvier 2013, les nominations officielles des Oscars 2013 ont été annoncées et Intouchables n''est finalement pas nommé.

En octobre 2015, Intouchables est considéré comme l’un des meilleurs films de ces dernières années dans une liste dévoilée par IMDb. Avec une note de 8.6/10, il est nommé meilleur film de l’année 2011.', 'Olivier Nakache et Éric Toledano', '2011-11-02', 2, 'intouchable.jpg', 'https://www.youtube.com/watch?v=EsaX5kltRcA');
INSERT INTO public.film (id_film, nom, description, realisateur, date, categorie, image, video) VALUES (11, 'Star Wars L''empire Contre-Attaque', 'L''Empire contre-attaque (The Empire Strikes Back) est un film américain de science-fiction de type space opera sorti en 1980, co-écrit par George Lucas et Lawrence Kasdan, et réalisé par Irvin Kershner. À partir de l''année 2000, il est exploité sous le nom Star Wars, épisode V : L''Empire contre-attaque (Star Wars: Episode V – The Empire Strikes Back).

C''est le deuxième opus de la saga Star Wars par sa date de sortie, mais le cinquième selon l''ordre chronologique de l''histoire. Il est le deuxième volet de la trilogie originale qui est constituée également des films Un nouvel espoir et Le Retour du Jedi.

L''histoire de cet épisode se déroule trois ans après les événements d’Un nouvel espoir. La guerre entre le maléfique Empire galactique et son antagoniste, l’Alliance rebelle, bat son plein. Les héros de l’Alliance Luke Skywalker et Han Solo se séparent après la prise de la principale base rebelle par l’Empire. Luke part sur la planète Dagobah afin de suivre la formation de Jedi auprès du maître Yoda. Solo tente lui d’échapper à la chasse spatiale que lui mène Dark Vador, l’apprenti de l’Empereur Palpatine.

George Lucas commence l’écriture du scénario en 1977. La préproduction du film dure un an. Le tournage en lui-même se déroule de mars à septembre 1979, principalement aux studios d''Elstree en Angleterre, mais aussi en extérieur en Norvège. La musique du film est composée et dirigée par John Williams. Lucas profite du vingtième anniversaire du premier Star Wars pour remonter légèrement le film en 1997 en y ajoutant des effets numériques.

Le film s''inspire à la fois des westerns, du cinéma japonais, et il utilise le concept du voyage du héros comme base narratologique. L''Empire contre-attaque est à la fois un succès commercial et un succès critique. Il remporte de nombreux prix, notamment deux Oscars.

L''Empire contre-attaque est sorti en VHS en octobre 1984 puis progressivement sur d''autres supports, et a également engendré un nombre important de produits dérivés. Il reste célèbre pour sa réplique culte : « Je suis ton père », adressée à Luke Skywalker par Dark Vador.', 'Irvin Kershner', '1980-09-04', 4, 'starwarsempire.jpg', 'https://www.youtube.com/watch?v=evII2gotY0c');
INSERT INTO public.film (id_film, nom, description, realisateur, date, categorie, image, video) VALUES (12, 'Rogue One - A Star Wars Story', 'Rogue One: A Star Wars Story ou Rogue One : Une histoire de Star Wars1 au Québec est un film de science-fiction américain de type space opera réalisé par Gareth Edwards, sorti en 2016. Écrit par Chris Weitz et Tony Gilroy, il s''agit du premier film de la série A Star Wars Story2, dont le deuxième est sorti en 20183.

L''histoire se déroule juste avant les événements de Star Wars, épisode IV : Un nouvel espoir, alors que l''Étoile de la mort, l''arme absolue de l''Empire galactique pour inspirer la peur aux systèmes insoumis, est en construction. L''Alliance rebelle, qui a appris l''existence de cette station de combat, en vole les plans pour y trouver une faille. Felicity Jones interprète Jyn Erso, une femme jusqu''alors solitaire et fille du concepteur de l''Étoile de la mort, recrutée par l''Alliance rebelle qui cherche notamment à se procurer un message de son père contenant des informations essentielles pour l''Alliance. Elle est accompagnée par Cassian Andor, joué par Diego Luna. Mads Mikkelsen interprète Galen Erso, le père de Jyn Erso, concepteur contraint de l''arme de l''Empire dont la construction est supervisée par le directeur Orson Krennic, joué par Ben Mendelsohn.

L''idée du film — qui marque le retour au cinéma de Dark Vador4, onze ans après sa dernière apparition dans La Revanche des Sith en 2005 — part d''une simple phrase apparue dans le bandeau déroulant qui ouvre l''épisode IV en 1977 : « Des espions rebelles ont réussi à voler les plans secrets de l''arme ultime de l''Empire, l''Étoile de la mort, une station spatiale blindée avec assez d''énergie pour détruire une planète entière5 ».

Acclamé par la critique, le film a notamment remporté l''Empire Award du meilleur film, du meilleur réalisateur, et de la meilleure actrice pour Felicity Jones en 2017, ainsi que deux nominations aux Oscars, pour les effets visuels et le mixage sonore. C''est un gros succès du box-office mondial : un mois après sa sortie en salles, le film dépasse le milliard de dollars de recettes, devenant ainsi le deuxième film de la franchise en termes de succès au box-office derrière Le Réveil de la Force et devant La Menace fantôme.', 'Gareth Edwards', '2016-12-14', 4, 'rogueone.jpg', 'https://www.youtube.com/watch?v=6yyO_fV-etY');
INSERT INTO public.film (id_film, nom, description, realisateur, date, categorie, image, video) VALUES (13, 'L''Exorciste', 'L’Exorciste (The Exorcist) est un film d''horreur américain réalisé par William Friedkin, sorti en 1973.

Il s''agit de l''adaptation cinématographique du roman du même nom de 1971 écrit par William Peter Blatty. Ce livre, inspiré d''un véritable cas d''exorcisme en 1949, raconte l''histoire d''une petite fille, Regan McNeil, possédée par un démon, et des exorcistes Lankester Merrin et Damien Karras qui tentent de l''exorciser1,2.

Le film met en vedette les acteurs Ellen Burstyn, Max von Sydow, Jason Miller et Linda Blair. Il repose sur la thématique de l''enfant démoniaque, à la suite de Rosemary''s Baby de Roman Polanski, et avant La Malédiction de Richard Donner.

L''Exorciste est l''un des films d''horreur les plus rentables de l''histoire avec 2 107 350 000 $ de recettes dans le monde entier en tenant compte de l''inflation3. Il est également considéré comme un classique du cinéma d''horreur, et l''American Film Institute l''a classé 3e meilleur thriller derrière Psychose et Les Dents de la mer. Il a reçu 2 Oscars et 4 Golden Globes. Le film a été commercialisé aux États-Unis par Warner Bros. le 25 décembre 1973, et une version restaurée est sortie le 22 septembre 2000.

Une série télévisée adaptée du film est diffusée depuis le 21 septembre 20164 sur le réseau FOX5. La série sert de suite au film et se déroule plusieurs années après les événements de ce dernier.', 'William Friedkin', '2001-03-21', 5, 'exorciste.jpg', 'https://www.youtube.com/watch?v=kuowPVqvnRk');
INSERT INTO public.film (id_film, nom, description, realisateur, date, categorie, image, video) VALUES (15, 'Sherlock Holmes', 'Sherlock Holmes est un film anglo-américano-allemand réalisé par Guy Ritchie, sorti en 2009. Écrit par Michael Robert Johnson, Anthony Peckham et Simon Kinberg , il est adapté du comic book1 jamais publié de Lionel Wigram et d''après les personnages créés par Sir Arthur Conan Doyle.

Il met en scène Robert Downey Jr. dans le rôle-titre et Jude Law dans celui du Dr Watson, ainsi que Rachel McAdams en Irène Adler et Kelly Reilly en Mary Morstan. Mark Strong interprète le principal antagoniste du film : Lord Blackwood.

Le film est sorti aux États-Unis le 25 décembre 2009 et le 3 février 2010 en France. Une suite, Sherlock Holmes : Jeu d''ombres, est sortie en 2011.

Après être venu à bout du tueur et occulte « magicien » Lord Blackwood, le légendaire détective Sherlock Holmes et son assistant le Dr Watson peuvent clore un autre cas brillamment résolu. Mais quand Blackwood revient mystérieusement d''entre les morts et reprend ses sombres activités, Holmes doit repartir sur ses traces. Devant gérer la nouvelle fiancée de son partenaire et le commissaire Lestrade, chef de Scotland Yard, le détective intrépide doit démêler les indices qui le mèneront vers une série de meurtres tordus, des tromperies et de la magie noire, ainsi que l''étreinte mortelle de la tentatrice Irène Adler.', 'Guy Ritchie', '2010-01-06', 6, 'sherlockholmes.jpg', 'https://www.youtube.com/watch?v=xm2B8zce_pg');
INSERT INTO public.film (id_film, nom, description, realisateur, date, categorie, image, video) VALUES (16, 'Le Parrain', 'Le Parrain (The Godfather) est un film américain de Francis Ford Coppola, sorti en 1972.

Produit par les studios Paramount, le film est une adaptation du roman du même nom de Mario Puzo. L''histoire se déroule de 1945 à 1955 et est centrée sur la famille Corleone, une des plus grandes familles de la mafia américaine. Le film aborde le sujet de la succession du patriarche de la famille, Vito Corleone dit le « Parrain » (Marlon Brando), et de l''ascension de son plus jeune fils, Michael (Al Pacino), qui initialement souhaite rester en dehors des activités criminelles de la famille. Mais, à cause d''un enchaînement de circonstances tragiques, Michael finit par en devenir le membre le plus impitoyable.

Le Parrain est considéré comme l''un des plus grands films du cinéma mondial1 et l''un des plus influents, spécialement dans le genre des films de gangsters2. Il est classé à la deuxième place des meilleurs films du cinéma nord-américain par l''American Film Institute (AFI) (derrière Citizen Kane)3. En 1990, le film est sélectionné par Le National Film Registry pour être conservé à la Bibliothèque du Congrès des États-Unis pour son « importance culturelle, historique ou esthétique »4.

Francis Ford Coppola réalisa deux suites à ce film : Le Parrain, 2e partie en 1974 et Le Parrain, 3e partie en 1990.

Le film remporta trois Oscars : celui du meilleur film, du meilleur acteur (Marlon Brando) et du meilleur scénario adapté pour Puzo et Coppola. Il reçut aussi sept nominations dans d''autres catégories incluant Al Pacino, James Caan et Robert Duvall pour l''Oscar du meilleur acteur dans un second rôle et Francis Ford Coppola pour celle de meilleur réalisateur.', 'Francis Ford Coppola', '1972-10-18', 6, 'parrain.jpg', 'https://www.youtube.com/watch?v=fF6Bc75HVBI');
INSERT INTO public.film (id_film, nom, description, realisateur, date, categorie, image, video) VALUES (18, 'Tu ne tueras point', 'Tu ne tueras point (Hacksaw Ridge) est un film de guerre australo-américain réalisé par Mel Gibson, sorti en 2016.

Le film est présenté hors compétition lors de la Mostra de Venise 2016.

Nommé dans six catégories pour les Oscars en 2017, dont meilleur film, meilleur réalisateur et meilleur acteur, le film remporte deux récompenses : l''Oscar du meilleur mixage de son et celui du meilleur montage.', 'Mel Gibson', '2016-11-09', 9, 'tunetueraspoint.jpg', 'https://www.youtube.com/watch?v=h1Jv5WdOrz8');
INSERT INTO public.film (id_film, nom, description, realisateur, date, categorie, image, video) VALUES (20, 'Transformers - The last Knight', 'Transformers: The Last Knight ou Transformers : Le Dernier Chevalier au Québec est un film de science-fiction américain réalisé par Michael Bay, sorti en 2017, C''est le cinquième opus de la série après Transformers (2007), Transformers 2 : La Revanche (2009), Transformers 3 : La Face cachée de la Lune (2011) et Transformers : L''Âge de l''extinction (2014).', 'Michael Bay', '2017-06-28', 10, 'transformersknight.jpg', 'https://www.youtube.com/watch?v=zatCSoJwhPE');


--
-- TOC entry 2148 (class 0 OID 113084)
-- Dependencies: 187
-- Data for Name: utilisateur; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2019 (class 2606 OID 113065)
-- Name: categorie categorie_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.categorie
    ADD CONSTRAINT categorie_pkey PRIMARY KEY (id_cat);


--
-- TOC entry 2022 (class 2606 OID 113082)
-- Name: film film_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.film
    ADD CONSTRAINT film_pkey PRIMARY KEY (id_film);


--
-- TOC entry 2024 (class 2606 OID 113093)
-- Name: utilisateur utilisateur_mail_key; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.utilisateur
    ADD CONSTRAINT utilisateur_mail_key UNIQUE (mail);


--
-- TOC entry 2026 (class 2606 OID 113091)
-- Name: utilisateur utilisateur_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.utilisateur
    ADD CONSTRAINT utilisateur_pkey PRIMARY KEY (id_user);


--
-- TOC entry 2020 (class 1259 OID 113083)
-- Name: film_categorie_idx; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX film_categorie_idx ON public.film USING btree (categorie);


--
-- TOC entry 2027 (class 2606 OID 113094)
-- Name: film fk_film__categorie; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.film
    ADD CONSTRAINT fk_film__categorie FOREIGN KEY (categorie) REFERENCES public.categorie(id_cat);


-- Completed on 2021-04-11 02:25:32

--
-- PostgreSQL database dump complete
--

