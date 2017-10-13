# replacevar plugin for Craft CMS

Replace environment variable and global strings.

## Installation

To install replacevar, follow these steps:

1. Download & unzip the file and place the `replacevar` directory into your `craft/plugins` directory
2.  -OR- do a `git clone https://github.com/zizther/replacevar.git` directly into your `craft/plugins` folder.  You can then update it with `git pull`
3. Install plugin in the Craft Control Panel under Settings > Plugins
4. The plugin folder should be named `replacevar` for Craft to see it.  GitHub recently started appending `-master` (the branch name) to the name of the folder for zip file downloads.

## Overview

Include reference tokens for environment variables and/or globals in your field values. To make a value parseable, enclose it with **single-brackets** and **no spaces**.

    Lorem ipsum {myEnvironmentVariable} sit amet. Ut enim ad {globalSet.fieldName}, quis nostrud exercitation.
The token name or global should be an exact match of an existing environment variable. If no match is found, the token will not be parsed out.

## Using replacevar

Just apply the `replacevar` or `rv` filter to your Twig variable:

    {{ entry.fieldName | replacevar }}
This also works if the token is part of a hard-coded string:

    {{ '{baseUrl}/contact-us' | rv }}
That's it! Any matching environment variables defined in your config file or globals will be parsed

It can also be called within other plugins or in Element API config

    craft()->replacevar->replacevar($entry->fieldName)

## What's an environment variable?

Within your `config/general.php` file, they are strings which can be defined differently for each of your environments.

Learn more about [environment variables...](http://buildwithcraft.com/docs/multi-environment-configs#environment-specific-variables)

## Requirements

- PHP 5.4+
- Craft 2.4+

## Kudos

Thanks to @carlcs for his help.
