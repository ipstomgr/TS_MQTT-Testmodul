<?php

declare(strict_types=1);

class TS_MQTT_Testmodul extends IPSModule
{
    public function Create()
    {
        //Never delete this line!
        parent::Create();
        $this->ConnectParent('{EE0D345A-CF31-428A-A613-33CE98E752DD}');

        $this->RegisterPropertyString('MQTTTopic', '');
        
    }

    public function ApplyChanges()
    {
        //Never delete this line!
        parent::ApplyChanges();
        $this->ConnectParent('{EE0D345A-CF31-428A-A613-33CE98E752DD}');
        //Setze Filter für ReceiveData
        $MQTTTopic = $this->ReadPropertyString('MQTTTopic');
        $this->SetReceiveDataFilter('.*' . $MQTTTopic . '.*');
    }

    public function ReceiveData($JSONString)
    {
		$MQTTTopic = $this->ReadPropertyString('MQTTTopic');
        $this->SendDebug('JSON', $JSONString, 0);
        if (!empty($this->ReadPropertyString('MQTTTopic'))) {
            $data = json_decode($JSONString);
            // Buffer decodieren und in eine Variable schreiben
            $Buffer = json_decode($data->Buffer);
           // $this->SendDebug('MQTT Topic', $Buffer->TOPIC, 0);

            if (property_exists($Buffer, 'TOPIC')) {
                    $this->SendDebug('Topic', $Buffer->TOPIC, 0);
                    $this->SendDebug('Msg', $Buffer->MSG, 0);
					$teile = explode("/", $Buffer->TOPIC);
					$ident = $teile[2];
					if (!empty($ident)) {
						$this->SendDebug('Variable', $ident, 0);
						$this->RegisterVariableString($ident, $ident, '');
						SetValue($this->GetIDForIdent($ident),$Buffer->MSG);
						
					}
					else{
						$this->SendDebug('Ident ist leer, Fehler !', $ident, 0);
					}
            }
        }
    }

}
