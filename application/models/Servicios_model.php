<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Servicios_model extends CI_Model {

    public function get_jugadores($id_jugador = null) {
        $this->db->select(' tab_jugadores.ID_JUGADOR,
  tab_jugadores.CEDULA,
  tab_jugadores.NOMBRES,
  tab_jugadores.APELLIDOS,
  tab_jugadores.APODO,
  tab_provincias.NOMBRE_PROVINCIA AS PROVINCIA_DOMICILIO,
  tab_jugadores.FECHA_NACIMIENTO,
  tab_provincias.NOMBRE_PROVINCIA AS PROVINCIA_RESIDENCIA,
  tab_jugadores.DIRECCION,
  tab_jugadores.TELEFONO,
  tab_escuelas.NOMBRE_ESCUELA,
  tab_puestos.DESCRIPCION_PUESTO,
  tab_jugadores.FOTOGRAFIA,
  tab_jugadores.ESTADO');
        $this->db->from('tab_jugadores');
        $this->db->join('tab_escuelas', 'tab_jugadores.ID_ESCUELA = tab_escuelas.ID_ESCUELA');
        $this->db->join('tab_puestos', 'tab_jugadores.ID_PUESTO = tab_puestos.ID_PUESTO');
        $this->db->join('tab_provincias', 'tab_jugadores.ID_PROVINCIA_NACIMIENTO = tab_provincias.ID_PROVINCIA');
        $this->db->join('tab_provincias tab_provincias1', 'tab_jugadores.ID_PROVINCIA_RESIDENCIA = tab_provincias1.ID_PROVINCIA');
        if (isset($id_jugador)) {
            $this->db->where('tab_jugadores.ID_JUGADOR', $id_jugador);
        }
        $this->db->order_by("apellidos,nombres");
        $consulta = $this->db->get();
        return $consulta->result();
    }

    public function get_jugadores_by_cedula($cedula) {
        $this->db->select(' tab_jugadores.ID_JUGADOR,
  tab_jugadores.CEDULA,
  tab_jugadores.NOMBRES,
  tab_jugadores.APELLIDOS,
  tab_jugadores.APODO,
  tab_provincias.NOMBRE_PROVINCIA AS PROVINCIA_DOMICILIO,
  tab_jugadores.FECHA_NACIMIENTO,
  tab_provincias.NOMBRE_PROVINCIA AS PROVINCIA_RESIDENCIA,
  tab_jugadores.DIRECCION,
  tab_jugadores.TELEFONO,
  tab_escuelas.NOMBRE_ESCUELA,
  tab_puestos.DESCRIPCION_PUESTO,
  tab_jugadores.FOTOGRAFIA,
  tab_jugadores.ESTADO');
        $this->db->from('tab_jugadores');
        $this->db->join('tab_escuelas', 'tab_jugadores.ID_ESCUELA = tab_escuelas.ID_ESCUELA');
        $this->db->join('tab_puestos', 'tab_jugadores.ID_PUESTO = tab_puestos.ID_PUESTO');
        $this->db->join('tab_provincias', 'tab_jugadores.ID_PROVINCIA_NACIMIENTO = tab_provincias.ID_PROVINCIA');
        $this->db->join('tab_provincias tab_provincias1', 'tab_jugadores.ID_PROVINCIA_RESIDENCIA = tab_provincias1.ID_PROVINCIA');

        $this->db->where('tab_jugadores.CEDULA', $cedula);

        $this->db->order_by("apellidos,nombres");
        $consulta = $this->db->get();
        return $consulta->result();
    }

    public function actualizar_jugador($id, $data) {
        $this->db->set("APODO", $data['APODO']);
        $this->db->set("DIRECCION", $data['DIRECCION']);
        $this->db->set("TELEFONO", $data['TELEFONO']);
        $this->db->where('ID_JUGADOR', $id);
        $result = $this->db->update('tab_jugadores');
        if ($result) {
            return "Data is updated successfully";
        } else {
            return "Error has occurred";
        }
    }

    public function get_campeonatos() {
        $this->db->select('*');
        $this->db->from('tab_campeonatos');
        $consulta = $this->db->get();
        return $consulta->result();
    }

    public function get_resultados($id_campeonato) {
        $this->db->select('  tab_partidos.ID_PARTIDO,
  tab_partidos.ID_CAMPEONATO,
  tab_partidos.FECHA,
  tab_partidos.HORA,
  tab_partidos.LUGAR,
  tab_clubes.NOMBRE_CLUB AS EQUIPO1,
  tab_partidos.GOLES_EQUIPO1,
  tab_partidos.PUNTOS_EQUIPO1,
  tab_clubes1.NOMBRE_CLUB AS EQUIPO2,
  tab_partidos.GOLES_EQUIPO2,
  tab_partidos.PUNTOS_EQUIPO2');

        $this->db->from('tab_partidos');

        $this->db->join('tab_clubes', 'tab_clubes.ID_CLUB = tab_partidos.ID_CLUB_EQUIPO1');
        $this->db->join(' tab_clubes tab_clubes1', 'tab_partidos.ID_CLUB_EQUIPO2 = tab_clubes1.ID_CLUB');

        $this->db->where('tab_partidos.ID_CAMPEONATO', $id_campeonato);
        $consulta = $this->db->get();
        return $consulta->result();
    }

    public function get_tabla($id_campeonato) {
        $sql = "select  
tx.ID_CLUB,
  tx.CODIGO,
  tx.NOMBRE_CLUB,
  sum(tx.GOLES) AS NUM_GOLES,
  sum(tx.PUNTOS) AS NUM_PUNTOS
from (
SELECT 
  tab_clubes.ID_CLUB,
  tab_clubes.CODIGO,
  tab_clubes.NOMBRE_CLUB,
  sum(tab_partidos.GOLES_EQUIPO1) AS GOLES,
  sum(tab_partidos.PUNTOS_EQUIPO1) AS PUNTOS
FROM
  tab_partidos
  INNER JOIN tab_clubes ON (tab_partidos.ID_CLUB_EQUIPO1 = tab_clubes.ID_CLUB)
WHERE 
  tab_partidos.ID_CAMPEONATO = $id_campeonato 
GROUP BY  
  tab_clubes.ID_CLUB, tab_clubes.CODIGO 
UNION 
   SELECT 
  tab_clubes.ID_CLUB,
  tab_clubes.CODIGO,
  tab_clubes.NOMBRE_CLUB,
  sum(tab_partidos.GOLES_EQUIPO2) AS GOLES,
  sum(tab_partidos.PUNTOS_EQUIPO2) AS PUNTOS
FROM
  tab_partidos
  INNER JOIN tab_clubes ON (tab_partidos.ID_CLUB_EQUIPO2 = tab_clubes.ID_CLUB)
WHERE 
  tab_partidos.ID_CAMPEONATO = $id_campeonato  
GROUP BY  
  tab_clubes.ID_CLUB, tab_clubes.CODIGO 
) tx    
GROUP BY  tx.ID_CLUB,
  tx.CODIGO,
  tx.NOMBRE_CLUB";
        $consulta = $this->db->query($sql);
        return $consulta->result();
    }
    
    public function indicencias($id_jugador) {
        $sql = "SELECT 
  tab_campeonatos.NOMBRE_CAMPEONATO, 
  tab_clubes.NOMBRE_CLUB AS EQUIPO1,
  tab_clubes1.NOMBRE_CLUB AS EQUIPO2,
   tab_partidos.FECHA,
  tab_jugadores.APELLIDOS,
  tab_jugadores.NOMBRES,
  tab_incidencias.MINUTOS_JUGADOS,
  tab_incidencias.NUMERO_LESIONES,
  tab_incidencias.NUMERO_TARJETAS_AMARILLAS,
  tab_incidencias.TARJETA_ROJA
FROM
  tab_incidencias
  INNER JOIN tab_partidos ON (tab_incidencias.ID_PARTIDO = tab_partidos.ID_PARTIDO)
  INNER JOIN tab_campeonatos ON (tab_partidos.ID_CAMPEONATO = tab_campeonatos.ID_CAMPEONATO)
  INNER JOIN tab_jugadores ON (tab_incidencias.ID_JUGADOR = tab_jugadores.ID_JUGADOR)
  INNER JOIN tab_clubes ON (tab_partidos.ID_CLUB_EQUIPO1 = tab_clubes.ID_CLUB)
  INNER JOIN tab_clubes tab_clubes1 ON (tab_partidos.ID_CLUB_EQUIPO2 = tab_clubes1.ID_CLUB)
WHERE
  tab_jugadores.ID_JUGADOR = $id_jugador ORDER BY 
    tab_campeonatos.NOMBRE_CAMPEONATO,    
   tab_partidos.FECHA,
  tab_jugadores.APELLIDOS,
  tab_jugadores.NOMBRES";
        
         $consulta = $this->db->query($sql);
        return $consulta->result();
    }

}
