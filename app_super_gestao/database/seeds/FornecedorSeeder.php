<?php

use App\Fornecedor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $fornecedor = new Fornecedor();
        $fornecedor->name = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'email@fornecedor.com';
        $fornecedor->save();

        Fornecedor::create([
            'name' => 'Fornecedor 200',
            'site' => 'fornecedor200.com.br',
            'uf' => 'DF',
            'email' => 'email@fornecedor200.com',
        ]);

        DB::table('fornecedores')->insert([
            'name' =>'Fornecedor 300',
            'site' => 'fornecedor300.com.br',
            'uf' =>'RJ',
            'email' =>'email@fornecedor300.com'
        ]);
        
    }
}
