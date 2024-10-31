<?php

class RLFEED{
    
    private $_RssGen         =   'http://www.romanialibera.ro/rss.xml';
    private $_RssActualitate =   'http://www.romanialibera.ro/rss/actualitate-162.xml';
    private $_RssCultura     =   'http://www.romanialibera.ro/rss/cultura-171.xml';
    private $_RssTehnologie  =   'http://www.romanialibera.ro/rss/stiinta-tehnologie-1005.xml';
    private $_RssOpinii      =   'http://www.romanialibera.ro/rss/opinii-168.xml';
    private $_RssViata       =   'http://www.romanialibera.ro/rss/stil-de-viata-174.xml';
    private $_RssTimpLiber   =   'http://www.romanialibera.ro/rss/timpul-liber-127.xml';
    private $_RssAldine      =   'http://www.romanialibera.ro/rss/aldine-1006.xml';
    private $_RssSpecial     =   'http://www.romanialibera.ro/rss/special-1007.xml';
    private $_RssSport       =   'http://www.romanialibera.ro/rss/sport-1004.xml';
    private $_RssSocietate   =   'http://www.romanialibera.ro/rss/societate-1003.xml';
    private $_RssEconomie    =   'http://www.romanialibera.ro/rss/economie-1002.xml';
    private $_RssPolitica    =   'http://www.romanialibera.ro/rss/politica-1001.xml';
    private $_general        =   array();
    private $_actualitate    =   array();
    private $_cultura        =   array();
    private $_tehnologie     =   array();
    private $_opinii         =   array();
    private $_viata          =   array();
    private $_timpLiber      =   array();
    private $_aldine         =   array();
    private $_special        =   array();
    private $_sport          =   array();
    private $_societate      =   array();
    private $_economie       =   array();
    private $_politica       =   array();
    public  $_rezultat       =   array();
    

    public function getNews($array){
        
        if(in_array('general', $array)){
            $xmlstr = file_get_contents($this->_RssGen);
            $xmlcont = new SimpleXMLElement($xmlstr);
            foreach($xmlcont as $url) 
            {
                foreach($url->item as $xml){
                    $this->_general[] = array(
                        'title' => (string)$xml->title,
                        'link'  => (string)$xml->link,
                        'date'  => (string)$xml->pubDate
                    );
                }
            }
        }
        if(in_array('actualitate', $array)){
            $xmlstr = file_get_contents($this->_RssActualitate);
            $xmlcont = new SimpleXMLElement($xmlstr);
            foreach($xmlcont as $url) 
            {
                foreach($url->item as $xml){
                    $this->_actualitate[] = array(
                        'title' => (string)$xml->title,
                        'link'  => (string)$xml->link,
                        'date'  => (string)$xml->pubDate
                    );
                }
            }
        }
        if(in_array('cultura', $array)){
            $xmlstr = file_get_contents($this->_RssCultura);
            $xmlcont = new SimpleXMLElement($xmlstr);
            foreach($xmlcont as $url) 
            {
                foreach($url->item as $xml){
                    $this->_cultura[] = array(
                        'title' => (string)$xml->title,
                        'link'  => (string)$xml->link,
                        'date'  => (string)$xml->pubDate
                    );
                }
            }
        }
        if(in_array('tehnologie', $array)){
            $xmlstr = file_get_contents($this->_RssTehnologie);
            $xmlcont = new SimpleXMLElement($xmlstr);
            foreach($xmlcont as $url) 
            {
                foreach($url->item as $xml){
                    $this->_tehnologie[] = array(
                        'title' => (string)$xml->title,
                        'link'  => (string)$xml->link,
                        'date'  => (string)$xml->pubDate
                    );
                }
            }
        }
        if(in_array('opinii', $array)){
            $xmlstr = file_get_contents($this->_RssOpinii);
            $xmlcont = new SimpleXMLElement($xmlstr);
            foreach($xmlcont as $url) 
            {
                foreach($url->item as $xml){
                    $this->_opinii[] = array(
                        'title' => (string)$xml->title,
                        'link'  => (string)$xml->link,
                        'date'  => (string)$xml->pubDate
                    );
                }
            }
        }
        if(in_array('viata', $array)){
            $xmlstr = file_get_contents($this->_RssViata);
            $xmlcont = new SimpleXMLElement($xmlstr);
            foreach($xmlcont as $url) 
            {
                foreach($url->item as $xml){
                    $this->_viata[] = array(
                        'title' => (string)$xml->title,
                        'link'  => (string)$xml->link,
                        'date'  => (string)$xml->pubDate
                    );
                }
            }
        }
        if(in_array('timp', $array)){
            $xmlstr = file_get_contents($this->_RssTimpLiber);
            $xmlcont = new SimpleXMLElement($xmlstr);
            foreach($xmlcont as $url) 
            {
                foreach($url->item as $xml){
                    $this->_timpLiber[] = array(
                        'title' => (string)$xml->title,
                        'link'  => (string)$xml->link,
                        'date'  => (string)$xml->pubDate
                    );
                }
            }
        }
        if(in_array('aldine', $array)){
            $xmlstr = file_get_contents($this->_RssAldine);
            $xmlcont = new SimpleXMLElement($xmlstr);
            foreach($xmlcont as $url) 
            {
                foreach($url->item as $xml){
                    $this->_aldine[] = array(
                        'title' => (string)$xml->title,
                        'link'  => (string)$xml->link,
                        'date'  => (string)$xml->pubDate
                    );
                }
            }
        }
        if(in_array('special', $array)){
            $xmlstr = file_get_contents($this->_RssSpecial);
            $xmlcont = new SimpleXMLElement($xmlstr);
            foreach($xmlcont as $url) 
            {
                foreach($url->item as $xml){
                    $this->_special[] = array(
                        'title' => (string)$xml->title,
                        'link'  => (string)$xml->link,
                        'date'  => (string)$xml->pubDate
                    );
                }
            }
        }
        if(in_array('sport', $array)){
            $xmlstr = file_get_contents($this->_RssSport);
            $xmlcont = new SimpleXMLElement($xmlstr);
            foreach($xmlcont as $url) 
            {
                foreach($url->item as $xml){
                    $this->_sport[] = array(
                        'title' => (string)$xml->title,
                        'link'  => (string)$xml->link,
                        'date'  => (string)$xml->pubDate
                    );
                }
            }
        }
        if(in_array('societate', $array)){
            $xmlstr = file_get_contents($this->_RssSocietate);
            $xmlcont = new SimpleXMLElement($xmlstr);
            foreach($xmlcont as $url) 
            {
                foreach($url->item as $xml){
                    $this->_societate[] = array(
                        'title' => (string)$xml->title,
                        'link'  => (string)$xml->link,
                        'date'  => (string)$xml->pubDate
                    );
                }
            }
        }
        if(in_array('economie', $array)){
            $xmlstr = file_get_contents($this->_RssEconomie);
            $xmlcont = new SimpleXMLElement($xmlstr);
            foreach($xmlcont as $url) 
            {
                foreach($url->item as $xml){
                    $this->_economie[] = array(
                        'title' => (string)$xml->title,
                        'link'  => (string)$xml->link,
                        'date'  => (string)$xml->pubDate
                    );
                }
            }
        }
        if(in_array('politica', $array)){
            $xmlstr = file_get_contents($this->_RssPolitica);
            $xmlcont = new SimpleXMLElement($xmlstr);
            foreach($xmlcont as $url) 
            {
                foreach($url->item as $xml){
                    $this->_politica[] = array(
                        'title' => (string)$xml->title,
                        'link'  => (string)$xml->link,
                        'date'  => (string)$xml->pubDate
                    );
                }
            }
        }
        $this->arrayConstruct();
    }
    
    private function arrayConstruct(){
        if(count($this->_general)){
            $this->_rezultat['general'] = $this->_general; 
        }
        if(count($this->_actualitate)){
            $this->_rezultat['actualitate'] = $this->_actualitate; 
        }
        if(count($this->_cultura)){
            $this->_rezultat['cultura'] = $this->_cultura; 
        }
        if(count($this->_tehnologie)){
            $this->_rezultat['tehnologie'] = $this->_tehnologie; 
        }
        if(count($this->_opinii)){
            $this->_rezultat['opinii'] = $this->_opinii; 
        }
        if(count($this->_viata)){
            $this->_rezultat['stil-de-viata'] = $this->_viata; 
        }
        if(count($this->_timpLiber)){
            $this->_rezultat['timp-liber'] = $this->_timpLiber; 
        }
        if(count($this->_aldine)){
            $this->_rezultat['aldine'] = $this->_aldine; 
        }
        if(count($this->_special)){
            $this->_rezultat['special'] = $this->_special; 
        }
        if(count($this->_sport)){
            $this->_rezultat['sport'] = $this->_sport; 
        }
        if(count($this->_societate)){
            $this->_rezultat['societate'] = $this->_societate; 
        }
        if(count($this->_economie)){
            $this->_rezultat['economie'] = $this->_economie; 
        }
        if(count($this->_politica)){
            $this->_rezultat['politica'] = $this->_politica; 
        }
    }
    
}

?>
