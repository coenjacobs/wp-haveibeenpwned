# Have I Been Pwned
This WordPress plugin checks if the password for each user account has been compromised via [haveibeenpwned.com](https://haveibeenpwned.com/), as soon as the user logs in. This will never send the actual password of your users, but it rather fetches a list to do the check locally. If the users password appears to be compromised, the user will be notified via an admin notice.

## How does this work?
When a user logs in, the first five characters of the hash made of a password are sent to the haveibeenpwned.com API. This API then returns a list of hashes of compromised passwords, all starting with the five characters provided. The check to see if the actual password used is on the list, is done locally and the password of the user is never being posted anywhere. Not even in hashed form.

## What is haveibeenpwned.com?
The website haveibeenpwned allows everyone to easily search through compromised sets of data, often sourced from leaked or hacked data. This data often contains usernames, passwords, email addresses and other personal data. [Troy Hunt](https://www.troyhunt.com/) is a well known security researcher and makes this data available for anyone to search and check if their data is potentially being compromised.