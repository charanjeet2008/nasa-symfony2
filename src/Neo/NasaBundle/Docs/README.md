**Installation**

composer update

**Run Persist Command**

 php app/console nasa:persist-ne
 
**Run Unit Tests**

phpunit -c app/

**Basic Service Flow**

```
FilterCollector
    |
    |
   \/
Downloader
    |
    |-------->FetchAPICaller
    |               |
    |               |------------->FetchURIBuilder
    |               |                   |
    |               |                   |-------------->BaseURIBuilder
    |               |                   |
    |-------->FetchResponseHandler
    |               |
    |               |-------------->NeoCollector   
    
