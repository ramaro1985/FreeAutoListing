# CHANGELOG

* v1.4.0
  * #76 : Fix PSR - travis build success
  * #71 : Add the ability to configure the number of items by sitemap
  * #58 : Remove temporary directory if no urlset was created

* v1.3.0
  * #42 : Remove serialize. The cache provider decides if serialization is the correct way to store the data.
  * #43 : Made Filename for dumped sitemaps configurable
  * 7476b29 : [dumper] add host option
  * dfc52e7 : Clean temporary files
  * 918b49e : [dumper] fake request and use request scope
  * 1553cdc : [dumper] gzip support

* v1.2.0 [tag](https://github.com/prestaconcept/PrestaSitemapBundle/commits/v1.2.0)
  * 09af5c0 : add annotation support for simple routes

* v1.1.0 [tag](https://github.com/prestaconcept/PrestaSitemapBundle/commits/v1.1.0)
  * a865420 : encode url & enclose user defined data in cdata section
  * b672175 : fix parameters in service definition

* v1.0.0 [tag](https://github.com/prestaconcept/PrestaSitemapBundle/commits/v1.0.0)
  * 7ad6eba : Dumper command 
  * Refactor [sf1 plugin]([http://www.symfony-project.org/plugins/prestaSitemapPlugin)
