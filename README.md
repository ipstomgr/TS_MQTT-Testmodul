# IPS-MQTT-Testmodule für eigene Arduino Sketche
Meldungsaufbau : mqtt.publish("Waage1/Scale1",String(Wert));

## 1. Voraussetzungen

* [Mosquitto Broker](https://mosquitto.org) 
    * [Installationanleitung](https://schnittcher.info/blog/installation-mosquitto-broker/)
* [MQTT Client](https://github.com/Schnittcher/IPS-KS-MQTT) - aktuell eine abgeänderte Version von [IPS_MQTT von thomasf68](https://github.com/thomasf68/IPS_MQTT)
    * [Konfiguration in IP-Symcon](https://schnittcher.info/blog/einrichtung-des-mqtt-clients-in-ip-symcon/)
* mindestens IPS Version 4.3
