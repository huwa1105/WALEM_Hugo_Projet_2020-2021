-- Créer une vue
create or replace view vue_films_cat as select
film.id_film,film.nom,film.description,film.realisateur, film.date,film.categorie,film.image,
categorie.id_cat,categorie.libelle
from film,categorie
where film.categorie = categorie.id_cat;