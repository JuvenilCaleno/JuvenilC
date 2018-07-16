<?php

class Campeonato_model extends CI_Model {

    public function get_campeonatos() {
        $this->db->select('*');
        $this->db->from('tab_campeonatos');
        $consulta = $this->db->get();
        return $consulta->result();
    }

    public function guardar_partido($datos) {
        $this->db->insert('tab_partidos', $datos);
    }

    public function get_partido($id_partido) {
        $sql = "SELECT
  cam.NOMBRE_CAMPEONATO,
  (select NOMBRE_CLUB FROM tab_clubes clu1 WHERE clu1.ID_CLUB = p.ID_CLUB_EQUIPO1  ) AS EQUIPO1,
  (select NOMBRE_CLUB FROM tab_clubes clu2 WHERE clu2.ID_CLUB = p.ID_CLUB_EQUIPO2  ) AS EQUIPO2
FROM tab_partidos p, tab_campeonatos cam

where
p.ID_CAMPEONATO =cam.ID_CAMPEONATO AND
p.ID_PARTIDO = $id_partido";
        $consulta = $this->db->query($sql);
        return $consulta->result();
    }

}
