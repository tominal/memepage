# memepage

A "cloud" solution for storing memes of types png, jpg, gif, & webm.

***

### What is the solution?

1. Log in using a Google account.
1. Upload memes through a drag/drop JavaScript system.
1. Files are served through the following system:

![memepage plan](http://memescdn.thomasj.me/assets/img/memepage_plan.png)

***

## **Requirements**

* #### Basic AWS knowledge.
    * Create a public bucket.
    * Forward the bucket through CloudFront.
* #### A MySQL & PHP 7+ webserver.
    * php-imagick ```sudo apt install php-imagick```
        * for thumbnailing.
* #### Basic Google API knowledge.
    * Create a Google + API project.
    * Set up your OAuth consent screen.
    * Create your OAuth 2 credentials.
    * Paste your Client ID, Client Secret, & Redirect URL into ```inc/config.php```

## **Installation**

1. #### Clone it.
1. #### Run `composer update`.

## **To-do list**

1. Finish tagging system.
1. Finish ImageMagick thumbnailing
    * which apparently uses ffmpeg 'under the hood'

```
async getCurrentLocation() {
  try {
    let localtime= await.this.geolocation.getCurrentPosition()
```
