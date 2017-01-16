from bs4 import BeautifulSoup
import urllib2
import os
import sys
import requests


#main_url
main_url = "http://www.imdb.com/search/title?year=2015,2015&title_type=feature&sort=moviemeter,asc"
print "Opening imdb"
r = requests.get(main_url)
data = r.text
supaPocetna = BeautifulSoup(data, "html.parser")
supa = supaPocetna.find("div", {"class":"article"})

for li in supa.findAll("h3", {"class":"lister-item-header"}):
		liA =  li.find("a")
		liHREF =  liA.get("href")
		liHREF = "http://www.imdb.com" + liHREF
		#mylink = mylink.text.encode('utf-8').decode	('ascii', 'ignore')
		print liHREF
		text_file = open("imdb.txt", 'a')
		text_file.write("%s\n" % (liHREF))
		text_file.close()
		print "Finished scraping"
   