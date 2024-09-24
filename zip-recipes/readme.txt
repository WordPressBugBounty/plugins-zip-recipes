=== Recipe Cards For Your Food Blog from Zip Recipes ===
Contributors: ibenic, freemius
Plugin Name: Recipe Cards For Your Food Blog from Zip Recipes (with Gutenberg support)
Plugin URI: https://www.ziprecipes.net
License: GPLv3 or later
Author URI: https://www.wpsimplegiveaways.com
Author: Simple Giveaways
Donate link: https://www.paypal.me/reallysimplessl
Tags: recipe, schema.org, seo, food, recipe card, recipe box, print recipe, recipe seo, cooking, nutrition
Requires at least: 4.8
Tested up to: 6.5.2
Stable tag: 8.2.6
Requires PHP: 7.2

Zip Recipes is the best way to easily create a beautiful food blog with professional looking recipes that can be found by Google. AMP (Accelerated Mobile Pages) compatible. Would you like to see what Zip Recipes can do for you? Visit our demo website: [demo.ziprecipes.net!](https://demo.ziprecipes.net/)

== Description ==

Easy to use recipe plugin that adds microdata and schema.org json ld to your recipes, so Google can find and understand them. AMP (Accelerated Mobile Pages) compatible.
We help you do that through our 4-step formula:

1. Easy to use
2. Professional look
3. Google friendly (schema.org and AMP compatible, rich snippets)
4. Integrates seamlessly with ad networks

Still got questions? [Go to our website for support](https://www.ziprecipes.net/support) or [email us](mailto:support@ziprecipes.net).

== Changelog ==
= 8.2.6 =
* New: Nutrition Details Block
* Bug fixes

= 8.2.5 =
* Better integrating with new licensing system
* [Premium] Leaving old licensing system for updates in case of the new license not being active
* [Premium] Moving back to the older format of the plugin folder name "zip-recipes-lover"

= 8.2.4 =
* New licensing software

= 8.2.3 =
* Security: sanitizing of recipe overview filter

= 8.2.2 =
* Improvement: PHP 8.2 compatibility
* Fix: Recipe Tags not linking correctly

= 8.2.1 =
* Improvement: WordPress tested up to 6.3
* Improvement: Fixed deprecation notice

= 8.2.0 =
* Fix: Recipe Grid not working in latest WordPress version

= 8.1.9 =
* Security: csrf

= 8.1.8 =
* Security: xss vulnerability

= 8.1.7 =
* Tested up to WordPress 6.2

= 8.1.6 =
* Improvement: catch non integer value in nutrition

= 8.1.5 =
* Fix: obsolete hooks
* Fix: PHP 8 compatibility

= 8.1.4 =
* Fix: creating two recipes when in Classic Editor mode, then clicking first "save", then "save and close"

= 8.1.3 =
* Fix: obsolete call made it impossible to remove recipe if sharing was enabled before
* Improvement: removed deprecated long_desc attribute from images

= 8.1.2 =
* Change: removed recipe sharing option.

= 8.1.1 =
* Fix: changed names of nutrition API output caused nutrition data not to get saved
* Fix: allow disabling of options that are set to default true

= 8.1.0 =
* Improvement: when recipe did not have a title, the print script should not try to retrieve it.

= 8.0.9 =
* Improvement: move nutrition label css outside recipe container, so it can be used outside a recipe

= 8.0.8 =
* Fix: when sharing was not enabled, saving a recipe could cause a validation error

= 8.0.7 =
* Fix: recipe sharing validation
* Improvement: output print file with Recipe title.

= 8.0.6 =
* Feature: Bulk monetizing
* Improvement: Dashboard UI for monetization

= 8.0.5 =
* Fix: feedback on not understandig ingredients

= 8.0.4 =
* Improvement: WCAG improvements
* Improvement: feedback on active sharing

= 8.0.3 =
* Fix: smooth scrolling in Chrome could be very slow because of chrome bug
* Fix: jump to recipe link not showing in some configurations

= 8.0.2 =
* Fix: css for new monetize settings block not minified.

= 8.0.1 =
* New: recipe sharing: a new way to monetize your recipes!

= 7.1.9 =
* Fix: upgrade causing broken template
* Fix: other plugins injecting notices in Zip settings page

= 7.1.8 =
* Improvement: template settings min width on smaller screens
* Improvement: Introduction tour on smaller screens not showing correctly

= 7.1.7 =
* Fix: license activation and updating not possible due to name change of plugin

= 7.1.6 =
* fix image change in preview mode
* fix stretched image in print view
* fix for shortcode matching with Gutenberg icw elementor

= 7.1.5 =
* Improvement: allow for mixed fraction numbers without spaces

= 7.1.4 =
* Fix: saving of admin notifications

= 7.1.3 =
* Fix: Images in instructions/ingredients were overriden by recipe image, if provided
* Fix: quotes resulted in double quotes on save in notes field

= 7.1.2 =
* Improvement: prevent overriding nutrition label style by themes
* Fix: pattern recognition issue in serving adjustment
* Fix: bold and italic css for Zip Recipes markup
* Fix: make sure demo recipe is installed only once

= 7.1.1 =
* Improvement: catch not existing curl
* Improvement: option to add nutrition disclaimer on nutritional text values
* Improvement: template save button also in template editor preview

= 7.0.13 =
* Fix: default setting for hide print image cause it to show as enabled after disabling it
* Fix: legacy image width setting still listed settings.

= 7.0.12 =
* Fix: for the unit 'g', the regex was not replacing the unit correctly
* Fix: support line breaks in notes and summary
* Improvement: also allow image editing outside preview

= 7.0.11 =
* Fix: Custom author option not enabled
* Fix: preview image not updating immediately after change

= 7.0.10 =
* Fix: preview numbering

= 7.0.9 =
* Fix: pinterest and reddit not sharing correctly

= 7.0.8 =
* Fix: numbering restarting after image in ingredients/instructions props @yaneli20

= 7.0.7 =
* Fix: categories check using term_exists instead of is_category

= 7.0.6 =
* Use title as fallback for description, when summary is empty
* Fix: recipe reviews not saving correctly

= 7.0.5 =
* Removed delay in preview
* Changed hyperlinks into divs for ratings/reviews, to prevent bot clickings

= 7.0.4 =
* Improvement: better preview functionality, making reloading on typing obsolete, and possibly fixing "blocked" messages from security tools
* Improvement: improved grid structure with half blocks, which in some themes could cause the blocks not te show next to each other

= 7.0.3 =
* Improvement: show warning when preview is blocked
* Fix:inline shortcodes parsing for ingredients and instructions

= 7.0.2 =
* Fix: recipeCategory array not converted to strings
* Fix: class in "add recipes" button caused unreadable style in other color schemes.
* Fix: migration did not remove image block or recipe title block when these were set to "hide"

= 7.0.1 =
* Fix: prevent css override on nobullets css style
* Improvement: Rich Snippets video json: add description fallback if no summary provided, and add uploadDate
* Fix: instructions list did not contain css for the nobullets class
* Fix: Due to 7.0.0.1 version, which compares to 7.0.0 as smaller, upgrade kept running

= 7.0.0.1 =
* fix: remove log in sanitize function

= 7.0.0 =
* Completely rebuilt Zip Recipes
* PHP 7.4 ready
* Dropped Twig
* Improved html structure, for better SEO and Google performance
* Improved Rich Snippet structure
* Improved customization options
* Drag & Drop recipe template
* Added overridable templates


= 6.4.5 =
* Fix: notifications settings not showing correctly

= 6.4.4 =
* Fix: prevent reviews and ratings from being active at the same time
* Improvement: add option to disable notifications for ratings

= 6.4.3 =
* Fix: ajax hooks called too late, causing the ajax submissions of ratings not to work.

= 6.4.2 =
* Fix loading of add ons on certain configurations

= 6.4.0 =
* New: notify the administrator when a rating or review is received
* Fix: when generating nutrition data, take not saved changes into account
* Tweak: new settings page design and technical structure

= 6.3.9 =
* Tweak: added option to load Grid Recipes with ajax
* Fix: search on recipe overview page

= 6.3.8 =
* Tweak: Recipe Grid could show some spaces on first pageload, because the actual window size was not exactly known yet. By recalculating the grid after 500 ms, this is corrected.

= 6.3.7 =
* Tweak: Edamam attribution

= 6.3.6 =
* Tweak: use display_name instead of nicename

= 6.3.5 =
* Tweak: improved review notice

= 6.3.4 =
* Fix: WordPress 5.3 compatibility issue with grid2 gutenberg block

= 6.3.3 =
* Fix: too loose regex causing the metric conversion to recognize words incorrectly as units

= 6.3.2 =
* Remove cup from imperial metric until there's a more dependable solution

= 6.3.1 =
* Added filter to override print CSS url
* Fix: CSS bug because of to generic CSS style

= 6.3.0 =
* Imperial metric converter

= 6.2.6 =
* Fix: calculation of serving adjustment not correct when jumping more than one unit at a time (e.g from 2 => 4 servings instead of 2=>3)

= 6.2.5 =
* Improvement: use default item prop for rating

= 6.2.4 =
* Improvement: extended rating feature with recipe details

= 6.2.3 =
* Fix: rating ratingCount checked in json instead of count

= 6.2.2 =
* Fix: inverted formate for small snippet image
* Fix: post categories not used

= 6.2.1 =
* New: Customize the generated rich snippets images
* New: three different rich snippet images with different image ratio's
* Fix: saving and deleting of image not working correctly when the save button is used after the change.

= 6.2.0 =
* New: Recipe Grid new style

= 6.1.1 =
* Fix: print styles for default theme
* Improvement: language strings for wp repo

= 6.1.0 =
* fix: print style did not include nutrition label html and css yet
* language files from the plugin should not get overridden by wp.org translations
* Added option to switch between text and html/css label

= 6.0.8 =
* fix: notices auto hiding, even when they should not auto hide
* Fix: some nutritional data was not being saved

= 6.0.7 =
* improvement: added save, and save & exit button to classic editor popup, so you don't have to exit the popup
* fix: preview automatically loaded last saved image in preview
* fix: saving description and notes not working in Classic Editor popup mode due to change into Rich Text mode
* fix: preview for description and notes not shown in preview editor

= 6.0.6 =
* Strip tags from description in JSON output
* Added review notice for free users
* set nutrition info to show by default
* Pull recipe title from post in classic editor popup

* added small margin to right of recipe adjustment input box, and put it in CSS class for better customization

= 6.0.5 =
* Added non food option, to use as instructions
* Restored popup option from Classic editor icon
* Added option to clear image
* Use different variable for JSON image, which can fallback to post image
* Fixed issue in recipe adjustment caused by move to json for schema.org

= 6.0.4 =
* Enforce not loading of styles when this option is disabled
* Grab post title as default recipe title
* Set yummly share button to smaller width, to prevent whitespace
* Use generic function for shortcode detection to ensure gutenberg compatibility (class.ziprecipes::amp_format)
* Improve schema.org by using only JSON LD, to prevent duplicate recipe detection
* Improve schema.org by adding keywords and video

= 6.0.3 =
* Fix: safari not supporting negative lookbehind pattern, causing the preview not to work
* Fix: too strict permissions for the recipe overview and recipe pages
* Tweak: hiding of duplicate recipe images made optional in settings

= 6.0.2 =
* Allow for text in yield field
* Improve total time calculation

= 6.0.1 =
* prevent escaping quotes in normal text

= 6.0.0 =
* User interface redesign

= 5.0.13 =
* Updated Twig library
* Allow index to show pages as well as posts
* Fix possible time parsing issue when time is entered as 1/2h instead of 0h30m
* Fixes some untranslatable strings

= 5.0.12 =
* Changed recipe image to large instead of full
* Added option to show nutrition label as schema.org html/css
* Added option to show nutrition label with a widget
* Added option to hide nutrition label
* Added option to hide other nutrition info

= 5.0.11 =
* limit bootstrap to back-end

= 5.0.10 =
* Fix: renamed licensing.php file to Licensing.php to fix licensing file not loading on some hosts

= 5.0.9 =
* Fix: order of constant declaration could cause plugin conflicts

= 5.0.8 =
* Fix: author did not save when only one author available

= 5.0.7 =
* Fix: include author in Gutenberg

= 5.0.6 =
* Fix: URL to print view styles not correct for some themes
* Fix: Gutenberg could cause an error in some situations
* Fix: compatibility issue with MailPoet
* Tweak: use alt text as default for image alt texts
* Tweak: cache directory moved to uploads folder
* Tweak: Changed cached directory

= 5.0.5 =
- Changed author: plugin development taken over by Really Simple Plugins
- Fix: Improved backend translatability by loading iframe on admin init hook
- Fix: improved translatability by adding twig gettext function for __() function
- Fix: fixed headers already sent error by exiting after loading iframe
- Fix: error on saving Gutenberg data because of missing properties

= 5.0.4 Bug fixes =

- Fixed an issue where some sites would crash when specific cook/prep time was entered
- Fixed an issue where formatting of subsections in a recipe wasn't working
- This only affects new users. You don't have to register Automatic Nutrition if you've done that in the past.

= 5.0.2 Best Recipe Creation Experience with Gutenberg =

- Best recipe creation experience: you can now create recipes quickly and more visually than ever before with Zip Recipes and Gutenberg. You can now see your recipe even after you save it while editing the rest of your post.
- New language: Japanese
- New: German, Spanish, French, Italian translations for "Category"


== Upgrade Notice ==

= 5.0.2 =

Completely new editing experience with Gutenberg + new language fixes
