<?php

class ldap 
{
    protected $ldaprdn;
    protected $ldappass;
    protected $ds;
    protected $dn;
    protected $puertoldap;
    public $ldapcon;
    public $indicator;

    public function __construct()
    {
        $this->ds = CONF_DBAD_DOMINIO;
        $this->puertoldap = CONF_DBAD_PORT;
        $this->dn = CONF_DBAD_DN;
    }
    
    public function setIndicator(string $indicator)
    {
        $this->indicator = trim($indicator);
    }

    public function setPassword(string $password)
    {
        $this->ldappass = trim($password); 
    }

    public function connect()
    {
        $this->ldapcon = ldap_connect($this->ds,$this->puertoldap);
        ldap_set_option($this->ldapcon, LDAP_OPT_PROTOCOL_VERSION,3); 
        ldap_set_option($this->ldapcon, LDAP_OPT_REFERRALS,0);
        $ldapbindAN = @ldap_bind($this->ldapcon);
    
        return $ldapbindAN;
    }

    public function ldapBind()
    {
        $this->ldaprdn = $this->indicator.'@'.CONF_DBAD_DOMINIO;
        $ldapbind = @ldap_bind($this->ldapcon, $this->ldaprdn, $this->ldappass);
        return $ldapbind;
    }
    
    public function ldapSearch()
    {
        $filter="(|(SAMAccountName=".$this->indicator."))";
        $fields = array("SAMAccountName","givenname","sn","mail"); 
        $sr = @ldap_search($this->ldapcon, $this->dn, $filter, $fields);
        $info = @ldap_get_entries($this->ldapcon, $sr); 
        $array = [$info[0]["samaccountname"][0],$info[0]["givenname"][0],$info[0]["sn"][0],$info[0]["mail"][0]];
        
        return $array;
    }
}