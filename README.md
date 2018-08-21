# memepage

A cloud solution for storing memes of all sorts.

Tested on local development before being pushed to the world.

08/15 - Aaaand here we are.
Let's track this tumor together shall we?

![](https://i.imgur.com/Jaqpngq.png)

***

### **Don't expect updates to this. This is a solution to my hard drive problem not a product. I also suck at making readable code when I'm not paid. Sorry :v**

What's the solution?

1. Log in through a cute panel via google preferably.
1. Drag memes into a box just like Dropbox.
1. JavaScript takes over and thumbnails/uploads files to AWS bucket.
1. Bucket is used as a CDN through CloudFront -> CloudFlare.

***

## **Requirements**

* #### Basic AWS knowledge.
    * How to create a public bucket.
    * How to forward the bucket through CloudFront.
* #### A server with MySQL & PHP 7+.
* #### Basic Google API knowledge.
    * Create a Google + API project.
    * Set up your OAuth consent screen.
    * Create your OAuth 2 credentials.
    * Paste your Client ID, Client Secret, & Redirect URL into ```inc/config.php```

## **Installation**

1. #### Clone it.
2. #### Run `composer update`.
