<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase {

    public function testGetUserById()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('tiketdailypass');

        $user = $this->CI->tiketdailypass->get_tiket_by_id(1);

        // Assert statements
        $this->assertEquals('GA - Early Entry', $user->ticketKategori);
        $this->assertEquals(4, $user->stok);
    }

    // Tambahkan metode pengujian lain sesuai kebutuhan
}
