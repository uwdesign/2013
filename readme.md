# UW Design 2013

We're using Guard to compile SCSS and Coffeescript to the Wordpress theme folder. To install:

```
$ cd /path/to/repo
$ bundle install
$ guard watch
```

Guard will watch changes to files in `/source`

## Deploying

The uwdesign2013.com site is hosted on [Padoga Box](https://pagodabox.com/). To host on Pagoda Box, included is a `Boxfile` containing some config info as well as the appropriate configuration in `/public/wp-config.php`.

We use `git` to deploy changes, e.g:

```
$ git remote add pagoda git@git.pagodabox.com:uwdesign2013.git
$ git add .
$ git commit -m "Example commit message"
$ git push pagoda master
```

There's some more info [here](http://help.pagodabox.com/)

---

Alternatively, simply make changes to the CSS and Javascript in `/public/wp-content/uwdesign20xx`, and push the `public` folder to any hosting service. Set up the `wp-config.php` file as specified by the host database.
