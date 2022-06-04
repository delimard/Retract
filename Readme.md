 
Retract module
==================
author: Delimard <support@delimard.fr>

<a href="https://www.buymeacoffee.com/delimard" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: 41px !important;width: 174px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>



Sommaire
-------
Module thelia pour generer un PDF de retractation client.

 
### Installation

#### Manuelle

* Copiez le module dans le dossier ```<thelia_root>/local/modules/```  et assurez-vous que le nom du module est bien Crossselling.
* Activez le depuis votre interface d'administration Thelia.


### Utilisation et Intégration
A ajouter sur la page "account-order" de votre template
```
<a href="{url path="/account/order/pdf/return/%id" id=$ID}">{intl l="Download"}</a>

```




