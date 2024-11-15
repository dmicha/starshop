-- INSERT INTO ships (id, name, class, captain, image_url, status_id)
-- VALUES 
--     (6, 'SS Enterprise', 'Star Cruiser', 'James T. Kirk', 'images/enterprise.png', 3),
--     (2, 'HMS Victory', 'Battleship', 'Horatio Nelson', 'images/victory.png', 2),
--     (3, 'USS Voyager', 'Intrepid Class', 'Kathryn Janeway', 'images/voyager.png', 1),
--     (4, 'CSS Alabama', 'Screw Sloop', 'Raphael Semmes', 'images/alabama.png', 1),
--     (5, 'SS Nautilus', 'Submarine', 'Nemo', 'images/nautilus.png', 2);

-- update ships SET image_url = 'https://upload.wikimedia.org/wikipedia/commons/3/32/CSSAlabama.jpg' WHERE id =4
UPDATE ships SET captain = 'Kathryn Janeway' WHERE id =3