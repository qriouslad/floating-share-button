# Floating Share Button

Contributors: qriouslad  
Donate link: https://paypal.me/qriouslad
Tags: share button, floating share, scriptless share, web share api, native mobile share, ios android share  
Requires at least: 5.0  
Tested up to: 6.0.3  
Stable tag: 1.7.0  
License: GPLv2 or later  
License URI: http://www.gnu.org/licenses/gpl-2.0.html

![](.wordpress-org/banner-1544x500.png)

Lightweight floating share button with responsive desktop sharesheet and native iOS and Android sharesheet.

## Description

This plugin enables a customizable, floating share button that triggers a responsive, customizable sharesheet on desktop devices and the native iOS or Android sharesheet on mobile devices using the [Web Share API](https://web.dev/web-share/).

### Features

* Supports 33 of the most popular sharing destinations (complete list below). Can be customized to show only destinations you choose.
* Uses SVG icon which looks sharp at any size and screen resolution
* Easily understandable and visual options to customize the button's appearance
* Customize when and how the button appears or disappears with screen scrolling progression
* Can be shown/hidden on either/both desktop and mobile views
* Lightweight. Minimal CSS and JS on the frontend with no jQuery dependency
* Great tandem with the [Flexible Scroll Top](https://wordpress.org/plugins/flexible-scroll-top/) plugin. Works beatifully on both desktop and mobile devices, especially if you are looking for a minimalist approach.

### Supported Sharing Destinations

* Social networks: Facebook, Twitter, LinkedIn, Pinterest, Snapchat, VK, QZone, Weibo, Mixi
* Chat apps: Whatsapp, Telegram, Messenger, Skype, WeChat, Line, Viber, QQ
* Email apps: Gmail, Ymail (Yahoo Mail), Outlook, Mail.ru, generic email
* Others: Tumblr, Reddit, Flipboard, Mix, InstaPaper, Pocket, Hacker News, Google Classroom, Buffer, Evernote, Trello
* Includes a QR code so people visiting your website on their laptop can easily share it directly from their mobile device
* On iOS or Android devices, the button will trigger the native OS sharesheet and can use any sharing destination supported by the OS or device. 

### Give Back

* [A nice review](https://wordpress.org/plugins/floating-share-button/#reviews) would be great!
* [Give feedback](https://wordpress.org/support/plugin/floating-share-button/) and help improve future versions.
* [Github repo](https://github.com/qriouslad/floating-share-button) to contribute code.
* [Donate](https://paypal.me/qriouslad) and support my work.

## Screenshots

1. The default floating share button  
   ![The default floating share button](.wordpress-org/screenshot-1.png)
2. The responsive desktop sharesheet  
   ![The responsive desktop sharesheet](.wordpress-org/screenshot-2.png)
3. The main settings page  
   ![The responsive desktop sharesheet](.wordpress-org/screenshot-3.png)
4. Customizing the appearance  
   ![Customizing the appearance](.wordpress-org/screenshot-4.png)
5. Customizing the behaviour  
   ![Customizing the behaviour](.wordpress-org/screenshot-5.png)
6. Customizing the desktop sharesheet  
   ![Customizing the desktop sharesheet](.wordpress-org/screenshot-6.png)
7. Screenshots of the native iOS and Android sharesheet  
   ![Screenshots of the native iOS and Android sharesheet](.wordpress-org/screenshot-7.png)

## Frequently Asked Questions

### How was this plugin built?

Flexible Scroll top was built with: [WordPress Plugin Boilerplate](https://github.com/devinvinson/WordPress-Plugin-Boilerplate/) | [wppb.me](https://wppb.me/) | [CodeStar framework](https://github.com/Codestar/codestar-framework) | [CodyFrame](https://github.com/CodyHouse/codyhouse-framework) | [bulma](https://bulma.io/) | Icons from [IconFinder.com](https://www.iconfinder.com/).

## Changelog

### 1.7.0 (2022.10.26)

* [Added] Suppression of all admin notices on the settings page
* [Changed] Put in place a prefixed CodeStar Framework to avoid collision with other plugins using this library
* [Changed] Improve settings page header links
* [Changed] Properly use wp_add_inline_style() to load CSS styles based on plugin settings
* [Changed] Properly use wp_localize_script() to load javascript code based on plugin settings
* [Changed] Increase share modal's z-index to make sure it overlays everything on screen

### 1.6.2 (2022.05.26)

* Tested to be compatible with WordPress 6.0
* Add review, feedback and donate links in settings page

### 1.6.1 (April 2022)

* Fix sharesheet close button size issue 

### 1.6.0 (April 2022)

* Downgrade CodeStar framework with free, lighter version 

### 1.5.2 (April 2022)

* Fix sizing issue with image select buttons due to css conflict 

### 1.5.0 (April 2022)

* Implement custom corner spacing option

### 1.4.2 (April 2022)

* Modify button z-index property so it stays on top of other elements on the page

### 1.4.1 (March 2022)

* Increase [QR code version](https://www.qrcode.com/en/about/version.html) from 5 to 8 to acommodate conversion of longer URL

### 1.4.0 (March 2022)

* Add dark and light mode for the sharesheet

### 1.3.1 (March 2022)

* Add background hover color settings
* Fix footer link to plugin page on wordpress.org

### 1.2.0 (March 2022)

* Security hardening by properly escaping output

### 1.1.0 (March 2022)

* Implement local QR code generator using chillerlan/php-qrcode library

### 1.0.0 (February 2022)

* Initial release