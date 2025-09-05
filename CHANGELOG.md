# Changelog

[//]: <> (
Types of changes
    Added for new Addeds.
    Changed for changes in existing functionality.
    Deprecated for soon-to-be removed Addeds.
    Removed for now removed Addeds.
    Fixed for any bug fixes.
    Security in case of vulnerabilities.
)

## [2.7.0](https://github.com/contao-themes-net/nature-theme-bundle/tree/2.7.0) – 2025-09-05

- [Added] Add corner ribbon to content box

## [2.6.0](https://github.com/contao-themes-net/nature-theme-bundle/tree/2.6.0) – 2025-08-08

- [Added] Fixed-position shortlinks for contact and social icons
- [Added] CSS classes for angled edges on articles (use `.has-slope-top-left`, `.has-slope-top-right`, `.has-slope-bottom-left` or `.has-slope-bottom-right` with background e.g. `.has-background-primary`)
- [Added] CSS class for full-width elliptical image (`.has-image-ellipse`)
- [Added] Icon in the header to toggle between normal mode and high contrast mode
- [Added] Implemented accessibility statement and linked it via an icon in the header
- [Added] Teaserbox supports right-aligned images via `image-right` class
- [Changed] Update sql files

## [2.5.1](https://github.com/contao-themes-net/nature-theme-bundle/tree/2.5.1) – 2025-07-24

- [Fixed] Demo data import for Contao 5.5

## [2.5.0](https://github.com/contao-themes-net/nature-theme-bundle/tree/2.5.0) – 2025-07-22

- [Added] Contao 5.6 compatibility
- [Added] Add contrast color schemes (only in v2) and accessibility changes
- [Changed] Use Bulma version 1.0

## [2.4.1](https://github.com/contao-themes-net/nature-theme-bundle/tree/2.4.1) – 2025-03-21

- [Fixed] Updated scssphp dependency to 1.0 for Contao 5.5 compatibility

## [2.4.0](https://github.com/contao-themes-net/nature-theme-bundle/tree/2.4.0) – 2024-12-05

- [Added] Add responsive tables (use template `content_element/table/table_nature`)
- [Fixed] Fix fourth level of mobile navigation ([#96](https://github.com/contao-themes-net/nature-theme-bundle/issues/96))

## [2.3.3](https://github.com/contao-themes-net/nature-theme-bundle/tree/2.3.3) – 2024-09-24

- [Fixed] Close mobile navigation after click if onepage navigation is enabled

## [2.3.2](https://github.com/contao-themes-net/nature-theme-bundle/tree/2.3.2) – 2024-04-22

- [Fixed] Fix form captcha (delete custom `form_captcha template`)

## [2.3.1](https://github.com/contao-themes-net/nature-theme-bundle/tree/2.3.1) – 2024-02-26

- [Changed] Change templates to support CSP on WYSIWYG editors like TinyMCE
- [Changed] Now require contao version ^5.3
- [Changed] Update sql files

## [2.3.0](https://github.com/contao-themes-net/nature-theme-bundle/tree/2.3.0) – 2024-08-02

- [Added] Add quote element
- [Added] Add templates to support onepage navigation
- [Added] Add form switch (use `form_checkbox_switch_nature` template)
- [Fixed] Fix styling for dark mode and dark colour scheme
- [Changed] Update sql files

## [2.2.1](https://github.com/contao-themes-net/nature-theme-bundle/tree/2.2.1) – 2023-04-17

- [Added] Add accordion arrows
- [Fixed] Fix event reader header image ([#75](https://github.com/contao-themes-net/nature-theme-bundle/issues/75))
- [Fixed] Fix `has-text-*` not working for headlines in dark mode ([#71](https://github.com/contao-themes-net/nature-theme-bundle/issues/71))
- [Fixed] Fix video for ios devices
- [Fixed] Fix button width for ios devices
- [Fixed] Remove Font Awesome css (is included via Font Awesome Inserttag Bundle)

## [2.2.0](https://github.com/contao-themes-net/nature-theme-bundle/tree/2.2.0) – 2023-02-13

- [Added] Add sql files for Contao 5.1
- [Changed] Change sql files for Contao 5.0
- [Fixed] Fix error messages styles
- [Fixed] Fix link color in hero element

## [2.1.1](https://github.com/contao-themes-net/nature-theme-bundle/tree/2.1.1) – 2022-12-08

- [Fixed] Fix migrations

## [2.1.0](https://github.com/contao-themes-net/nature-theme-bundle/tree/2.1.0) – 2022-12-05

- [Added] Add multi domain support
- [Changed] Change migration order
- [Fixed] Fix image alignment for text elements [#64](https://github.com/contao-themes-net/nature-theme-bundle/issues/64)

## [2.0.0](https://github.com/contao-themes-net/nature-theme-bundle/tree/2.0.0) – 2022-02-09

- [Changed] Increase Contao version to 5 only
- [Added] Add migrations for demo data import (Setup without further steps, install and run migrations -> Done!)
- [Removed] Cleanup older Contao SQL files
- [Added] Add more options to style content slider

## [1.11.1](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.11.1) – 2023-02-13

- [Changed] Change font paths
- [Changed] Change sql files for Contao 4.13
- [Fixed] Fix smooth scroll javascript (return nothing if href is empty)
- [Fixed] Fix error messages styles
- [Fixed] Fix link color in hero element

## [1.11.0](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.11.0) – 2022-11-30

- [Added] Add multi domain support

## [1.10.0](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.10.0) – 2022-10-25

- [Added] Add more options to style content slider

## [1.9.2](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.9.2) – 2022-10-11

- [Changed] now require terminal42/contao-folderpage version 2.* or 3.*
- [Changed] load custom stylesheets after nature stylesheets [#56](https://github.com/contao-themes-net/nature-theme-bundle/issues/56)
- [Fixed] css fix for bold font in footer
- [Changed] add bulma container variables to _custom_variables.scss [#56](https://github.com/contao-themes-net/nature-theme-bundle/issues/56)

## [1.9.1](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.9.1) – 2022-09-22

- [Changed] change templates for maklermodul bundle

## [1.9.0](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.9.0) – 2022-04-08

- [feature] update bulma version (0.9.3)
- [fix] replace patchwork/utf8
- [info] set php 7.1 to minimum requirement
- [fix] change custom template in contao 4.13 sql file
- [fix] css fix for navbar dropdown background
- [fix] display galleries mobile single column

## [1.8.2](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.8.2) – 2022-04-01

- [fix] fix slider element error

## [1.8.1](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.8.1) – 2022-03-09

- [fix] add support for Symfony 5 public entry point
- [fix] update fe_page template

## [1.8.0](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.8.0) – 2022-02-15

- [feature] add sql files for contao 4.13
- [fix] fix form_password template
-
## [1.7.3](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.7.3) – 2022-02-17

- [fix] add mod_newsreader_header_nature template to hide comments in newsreader header image

## [1.7.2](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.7.2) – 2021-12-13

- [fix] bufixes for header image and megamenu

## [1.7.1](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.7.1) – 2021-12-03

- [fix] update social feed template

## [1.7.0](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.7.0) – 2021-11-19

- [feature] add new header layout to show logo and navigation below each other
- [feature] php 8 support

## [1.6.0](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.6.0) – 2021-10-22

- [feature] megamenu

## [1.5.1](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.5.1) – 2021-09-24

- [fix] responsive columns

## [1.5.0](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.5.0) – 2021-08-25

- [feature] add sql files for contao 4.12
- [fix] update styling

## [1.4.3](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.4.3) – 2021-04-30

- [fix] sticky teaserbox ([#23](https://github.com/contao-themes-net/nature-theme-bundle/issues/23))

## [1.4.2](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.4.2) – 2021-03-15

- [fix] css fix for fullheight teaserbox ([#22](https://github.com/contao-themes-net/nature-theme-bundle/issues/22))
- [fix] css fixes for dark mode and breadcrumb

## [1.4.1](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.4.1) – 2021-02-15

- [fix] css fix for fullheight teaserbox
- [fix] update modal template

## [1.4.0](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.4.0) – 2021-02-12

- [feature] add sql files for contao 4.11

## [1.3.8](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.3.8) – 2021-01-11

- [fix] update fe_page and css fix for dark mode
- [fix] css fix for navigation
- [fix] replace <footer> with <div> in sql files

## [1.3.7](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.3.7) – 2020-12-14

- [fix] update theme tags config

## [1.3.6](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.3.6) – 2020-12-04

- [fix] update theme tags config
- [fix] update maklermodul template

## [1.3.5](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.3.5) – 2020-09-23

- [fix] update composer.json

## [1.3.4](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.3.4) – 2020-08-19

- [feature] add sql files for contao 4.10.0
- [fix] version is hidden if you click to synchronize theme files

## [1.3.3](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.3.3) – 2020-07-24

- [fix] dark mode

## [1.3.2](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.3.2) – 2020-07-08

- [fix] centered images with class has-text-centered

## [1.3.1](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.3.1) – 2020-06-26

- [fix] update feature element
- [fix] add fourth nav menu
- [fix] Duplicate ID navbarMain

## [1.3.0](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.3.0) – 2020-06-12

- [feature] add more padding if home slider is hidden, add ref to url in theme setup page

## [1.2.9](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.2.9) – 2020-05-04

- [fix] remove css list style from gallery
- [fix] fix links in feature element

## [1.2.8](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.2.8) – 2020-04-29

- [feature] add mobile breakpoint variable
- [fix] fix mobile navigation bug

## [1.2.7](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.2.7) – 2020-04-27

- [fix] fix dropdown navigation for touch devices

## [1.2.6](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.2.6) – 2020-04-21

- [fix] css fix for mobile devices

## [1.2.5](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.2.5) – 2020-04-07

- [fix] remove margin for tabs

## [1.2.4](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.2.4) – 2020-03-27

- [fix] remove html errors and warnings

## [1.2.3](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.2.3) – 2020-03-23

- [fix] update css

## [1.2.2](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.2.2) – 2020-03-17

- [fix] fix scss paths for local installation on windows

## [1.2.1](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.2.1) – 2020-02-21

- [fix] bugfix sql files for contao 4.9

## [1.2.0](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.2.0) – 2020-02-21

- [feature] add contao 4.9 support
- [feature] add text modal element

## [1.1.4](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.1.4) – 2020-02-03

- [fix] update social feed templates

## [1.1.3](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.1.3) – 2020-02-03

- [fix] css fix for calendar

## [1.1.2](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.1.2) – 2019-11-28

- [fix] update exposé template for maklermodul bundle

## [1.1.1](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.1.1) – 2019-11-27

- [fix] update css for maklermodul (colour schemes and dark mode)

## [1.1.0](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.1.0) – 2019-11-27

- [feature] add css and templates for maklermodul

## [1.0.7](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.0.7) – 2019-11-13

- [fix] fix icon in social feed template

## [1.0.6](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.0.6) – 2019-11-08

- [fix] load custom scss after theme scss

## [1.0.5](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.0.5) – 2019-11-04

- [feature] add sql files for contao minimal installation

## [1.0.4](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.0.4) – 2019-10-24

- [fix] update css for dark mode

## [1.0.3](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.0.3) – 2019-10-24

- [fix] background color of dropdown nav in dark mode

## [1.0.2](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.0.2) – 2019-10-15

- update sql file for contao 4.8

## [1.0.1](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.0.1) – 2019-10-15

- add support for cotnao 4.8

## [1.0.0](https://github.com/contao-themes-net/nature-theme-bundle/tree/1.0.0) – 2019-10-10

- first stable release
