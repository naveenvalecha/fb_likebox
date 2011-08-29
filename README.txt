-- SUMMARY --

Simple module that provides a block with the latest updates from Facebook for
the provided account. It is based on the likebox social plugin:
http://developers.facebook.com/docs/reference/plugins/like-box. The widget
settings are configurable for users with 'admin facebook widget settings'
permission.


-- REQUIREMENTS --

* None.


-- INSTALLATION --

* Install as usual, see http://drupal.org/node/70151 for further information.


-- CONFIGURATION --

* Go to Administer > Site configuration > Facebook Likebox Settings and

 - Add the Facebook Page (i.e.: http://www.facebook.com/wikisaber.es) and
   configure the display and appearance settings.

 - Configuration examples:

 -- A) Faces and stream (default)
 --- Show Stream: Yes
 --- Show Faces: Yes
 --- Height: 556

 -- B) Without Faces
 --- Show Stream: Yes
 --- Show Faces: No
 --- Height: 292

 -- C) Without Stream and Faces
 --- Show Stream: No
 --- Show Faces: No
 --- Scrollling: Disabled
 --- Height: 63

* Add the block "'Your site name' on Facebook" to a region.

-- CONTACT --

david.rozas@gmail.com
