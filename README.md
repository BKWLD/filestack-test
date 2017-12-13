# Filestack Test

Test that a server can dial out to Filestack's API.

## Installation

1. Run `composer install` from this directory
2. Rename `.env.sample` to `.env` and set your API key and secret

## Usage

Run `php index.php` from within the directoy.  You should see the following output:

```
Starting
--------
Uploading
Uploaded: 3RWTzyATRAXTkRQvPSSs
Reading
Read: Uploaded file contents
Deleting
Deleted
-------------
Test complete
```

The handle string shown after `Uploaded: ` will be different on every execution.
