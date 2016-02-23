#Readme

* Author: [Ryan Fitton](https://ryanfitton.co.uk)
* Version: `1.0`
* Website: [https://ryanfitton.co.uk](https://ryanfitton.co.uk)
* More info on this repository: [https://ryanfitton.co.uk/blog/using-statuscake-com-to-monitor-your-website-and-database-uptime/](https://ryanfitton.co.uk/blog/using-statuscake-com-to-monitor-your-website-and-database-uptime/)


##Website Check Monitor script

For use with StatusCake: [statuscake.com](https://www.statuscake.com/).

This code may be used with other monitoring services, however you may need to perform some extra coding modifications.

This code will send a HTTP Status 200 (Ok) or Status 404 (Not found) depending if a database connection can be established. This will 'trick' the uptime test into thinking if the page is up/down.

###WordPress Issues
If you experience 404 issues with WordPress when using .htaccess/.htpasswd protected folders.

Add these lines of code within WordPress' .htaccess file under the part which says `# END WordPress`

```
ErrorDocument 401 default
ErrorDocument 403 default
```


##License
The license for this software is [Creative Commons: Attribution 4.0 International](https://creativecommons.org/licenses/by/4.0/).

This means you can Share and Redistribute in any medium or form. You can Adapt the code to suit your needs, and build in new code. The software can be used personally or commercially.

You must give attribution to the original author ([Ryan Fitton](https://ryanfitton.co.uk)). You can give attribution by including my name and linking to my website: [https://ryanfitton.co.uk](https://ryanfitton.co.uk) within the top of the monitoring PHP code.

![https://licensebuttons.net/l/by/4.0/88x31.png](https://licensebuttons.net/l/by/4.0/88x31.png "Creative Commons Attribution 4.0 International License")

Creative Commons Licence: Website Check Monitor script by Ryan Fitton is licensed under a Creative Commons Attribution 4.0 International License.


##Warranty
Ryan Fitton disclaims all warranties with regard to this software, including all implied warranties of merchantability and fitness. In no event shall Ryan Fitton be liable for any special, indirect or consequential damages or any damages whatsoever resulting from loss of use, data or profits, whether in an action of contract, negligence or other tortuous action, arising out of or in connection with the use or performance of this software.