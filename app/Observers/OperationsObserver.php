<?php

namespace App\Observers;

use App\Models\Operation;



class OperationsObserver extends BaseObserver
{
    // this function is called when a action triggred // insert | delete |update
    public function update($table_name, $action, $row_id): void
    {
        $message = [
            'insert' => 'Ajouté avec succès',
            'update' => 'Modifié avec succès',
            'delete' => 'Supprimé avec succès',
        ];

        setMessage('action_success', $message[$action]);

        $user = auth()->user();
        $op = new Operation;
        $op->insert([
            'table_name' => $table_name,
            'row_id' => $row_id,
            'action' => $action,
            'user_nom_complet' => $user['nom_fr'] . " " . $user['prenom_fr'],
            'user_id' => $user['id']
        ]);
    }
}