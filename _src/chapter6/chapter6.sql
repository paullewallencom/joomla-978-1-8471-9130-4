SELECT id FROM jos_components WHERE link = 'option=com_reviews';

INSERT INTO jos_components (name, parent, admin_menu_link, admin_menu_alt, ordering)
VALUES ('Manage Comments', 34, 'option=com_reviews&task=comments', 'Manage Comments', 1);