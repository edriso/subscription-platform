<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class EmailValidationTest extends TestCase
{
    public function test_email_rule_accepts_valid_addresses_and_rejects_control_characters(): void
    {
        $this->assertTrue(Validator::make(['email' => 'reader@example.com'], ['email' => 'required|email'])->passes());
        foreach (["reader@example.com\r\nBcc: other@example.com", "reader\r\n@example.com", "reader@example.com\0"] as $email) {
            $this->assertTrue(Validator::make(['email' => $email], ['email' => 'required|email'])->fails());
        }
    }
}
