<?php

class Clubes_model extends CI_Model {

    public function get_equipos_campeonato($id_campeonato) {
        $this->db->select('tab_clubes.ID_CLUB, tab_clubes.NOMBRE_CLUB');
        $this->db->from('tab_equipos_participantes');
        $this->db->join('tab_clubes', 'tab_equipos_participantes.ID_CLUB = tab_clubes.ID_CLUB');
        $this->db->where('tab_equipos_participantes.ID_CAMPEONATO', $id_campeonato);
        $consulta = $this->db->get();
        return $consulta->result();
    }

}
