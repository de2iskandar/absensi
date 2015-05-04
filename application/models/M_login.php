<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

    public function cek_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $qo = $this->db->where('id_user', $username)
                          ->where('password', $password)
                          ->limit(1)
                          ->get('operator');

        $qg = $this->db->where('id_user', $username)
                          ->where('password', $password)
                          ->limit(1)
                          ->get('guru');

        if ($qo->num_rows() == 1)
        {
            foreach ($qo->result() as $sess) {
                $sess_data['is_logged_in'] = TRUE;
                $sess_data['nama'] = $sess->nama;
                $sess_data['level'] = 'admin';
                $this->session->set_userdata($sess_data);
            }
            return TRUE;
        }
        elseif ($qg->num_rows() == 1)
        {
            foreach ($qg->result() as $sess) {
                $sess_data['is_logged_in'] = TRUE;
                $sess_data['nama'] = $sess->nama_guru;
                $sess_data['level'] = 'guru';
                $this->session->set_userdata($sess_data);
            }
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function logout()
    {

    }
}