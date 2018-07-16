<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jugadores_model
 *
 * @author José Luis
 */
class Jugadores_model extends CI_Model {

    //put your code here
    public function jugadores_partido($id_partido) {
        $sql = "SELECT juga.ID_JUGADOR, clu.NOMBRE_CLUB,juga.APELLIDOS, juga.NOMBRES FROM tab_partidos pa, tab_campeonatos ca, tab_clubes clu, tab_equipos_participantes eq,tab_jugadores_participantes ju, tab_jugadores juga
where
  pa.ID_CAMPEONATO = ca.ID_CAMPEONATO AND
  (pa.ID_CLUB_EQUIPO1 = clu.ID_CLUB OR  pa.ID_CLUB_EQUIPO2 = clu.ID_CLUB) AND
  clu.ID_CLUB = eq.ID_CLUB AND
  ca.ID_CAMPEONATO = eq.ID_CAMPEONATO AND
  ju.ID_EQUIPOS_PARTICIPANTES = eq.ID_EQUIPOS_PARTICIPANTES AND
  ju.ID_JUGADOR =juga.ID_JUGADOR AND
  pa.ID_PARTIDO = $id_partido
order by
  clu.NOMBRE_CLUB,juga.APELLIDOS, juga.NOMBRES";
        $consulta = $this->db->query($sql);
        return $consulta->result();
    }
    
    

}
