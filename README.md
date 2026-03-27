Quick Style for phpBB 3.3
==========

Extension for phpBB 3.3 to let visitors quickly switch board styles.

![Screenshot](screenshot.png)

##### Based on Prime Quick Style for phpBB 3.0, by Ken F. Innes IV ([primehalo](http://www.absoluteanime.com/admin/mods.htm))

## Features
- Adds a dropdown menu to the breadcrumb bar (same look and feel as prosilver's username dropdown) showing all active styles. The current style is indicated with a checkmark.
- Automatically redirects back to the original page being viewed after style has changed.
- Works for guests too, using a cookie to remember the selected style.
- Per-group permission (`u_quickstyle`) to control who can see the style switcher — enabled by default for all users and guests.
- ACP module to configure default placement location.
- Hidden on mobile screens (below 700px) to keep the responsive layout clean.

### Placement
By default, the style switcher is inserted to the right of the breadcrumb navigation in the header, using the `overall_header_breadcrumbs_after` template event.

To place it somewhere else in your style, set "Use default template location" to "No" in the ACP, then include the `quickstyle_event` template event at the desired location in your style template:
```html
{% EVENT quickstyle_event %}
```
The extension will automatically prevent duplicate rendering if both events are present.

### Changelog
- 2.0.0 (2026-03-27) — **Breaking change**: namespace moved from `paybas/quickstyle` to `avathar/quickstyle`. Uninstall the old extension before installing this version.
  - [CHG] Namespace changed from `paybas\quickstyle` to `avathar\quickstyle`
  - [CHG] Require PHP 8.0+ and phpBB 3.3.0+
  - [CHG] Fix PHP 8.x deprecations (static public → public static, return types)
  - [SEC] Validate style IDs against active styles before applying
  - [DEL] Remove subsilver2 and proFormell legacy style overrides
  - [CHG] Move inline styles to CSS, responsive hide on mobile (700px breakpoint)
  - [CHG] Replace select element with prosilver-native dropdown menu
  - [NEW] Per-group user permission `u_quickstyle` (replaces allow_guests config toggle)
  - [CHG] Add language packs: cs, de, de_x_sie, es_x_tu, pt, sk, sv, uk

- 1.4.3
  - [FIX] don't use single or double quotes in language strings
  - [FIX] change global language to container
  - [FIX] migration error
  - [CHG] change to twig syntax, fix css path

- 1.4.1 (12/07/2020)
  - [NEW] phpBB 3.2 support.
  - [FIX] upgrade usage of deprecated phpBB functions

#### Requirements
- phpBB 3.3.0 or higher
- PHP 8.0 or higher

#### Languages supported
- Arabic
- Croatian
- Czech
- Dutch
- English
- Estonian
- French
- German (informal)
- German (formal / Sie)
- Greek
- Portuguese
- Russian
- Slovak
- Spanish
- Spanish (informal / tu)
- Swedish
- Turkish
- Ukrainian



## Installation
1. [Download the latest release](https://github.com/avatharbe/quickstyle/releases) and unzip it.
2. Copy the entire contents from the unzipped folder to `phpBB/ext/avathar/quickstyle/`.
3. Navigate in the ACP to `Customise -> Manage extensions`.
4. Find `Quick Style` under "Disabled Extensions" and click `Enable`.

## Uninstallation
1. Navigate in the ACP to `Customise -> Manage extensions`.
2. Click the `Disable` link for `Quick Style`.
3. To permanently uninstall, click `Delete Data`, then delete the `quickstyle` folder from `phpBB/ext/avathar/`.


### License
[GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)

© 2015 - PayBas
© 2020-2026 - Sajaki
