from bs4 import BeautifulSoup
import urllib2
import os
import sys
import requests


#main_url
main_url = "http://cucirca.eu"
print "Opening cucirca"
r = requests.get(main_url)
data = r.text
supaPocetna = BeautifulSoup(data, "html.parser")
supa = supaPocetna.find("div", {"id":"hometop"})

for li in supa.findAll("li"):
		liA =  li.find("a")
		liHREF =  liA.get("href")
		#mylink = mylink.text.encode('utf-8').decode	('ascii', 'ignore')
		print liHREF
		text_file = open("cucirca.txt", 'a')
		text_file.write("%s\n" % (liHREF))
		text_file.close()
		print "Finished scraping"
   