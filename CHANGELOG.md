# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Changed

- Add changelog file style

<br>

## [1.1.0] - 2025-07-17

### Changed

- Remove nofollow
- Media list

### Fixed

- Fix information in README
- Fix "Function _load_textdomain_just_in_time was called incorrectly" error

<br>

## [1.0.0] - 2023-08-06

### Added

- Add minified scripts and styles
- Add class MediaRecord
- Add support for Pixabay, Pexels and Unsplash license

### Changed

- Complete overhaul of the plugin files and structure
- Update German translation
- Replace license table with constant array
- Add more sanitizing/escaping

### Removed

- Remove media indexing
- Remove admin menu
- Remove listing of all available licenses

### Fixed

- Fix scripting in attachment pages

<br>

## [0.0.4] - 2023-08-03

### Changed

- Extract changelog from README.md
- Change namespace to mdb_license_management\media_library

### Fixed

- Fix "Trying to access array offset on value of type null"
- Fix wrong path var in backend.php
- Fix uncaught PHP error
- Fix PHP warning (mainpage.php)

<br>

## [0.0.3] - 2023-02-06

### Added

- Add /core folder with all provided core and API functions
- Add namespace mdb_license_management
- Add backend.php
- Add translation support
- New: PLUGIN_DIR, PLUGIN_URL, PLUGIN_VERSION
- New: TABLE_MEDIA, TABLE_LICENSES, MENU_SLUG
- New: German translation

### Changed

- Rename /inc to /includes
- Improve Changelog style and language
- Improve: Documentation style and language
- Improve: Including of core and class files
- Improve: text domain
- Improve: Remove compatibility to old implementations
- Improve: Primary language is EN
- Improve: Change repository name
- Improve: Various code simplifications

### Fixed

- Bugfix: Change handle names in backend.php

<br>

## [0.0.2] - 20022-03-27

### Changed

- Improve: plugin.php is now the new starting point
- Improve: Documentation
- Improve: Directory structure
- Improve: Conditions are now in the YODA style

<br>

## [0.0.1] - 2018-08-21

- Initial commit
