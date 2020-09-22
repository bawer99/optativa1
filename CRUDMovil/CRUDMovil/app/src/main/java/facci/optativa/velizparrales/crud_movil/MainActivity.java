package facci.optativa.velizparrales.crud_movil;

import androidx.appcompat.app.AppCompatActivity;

import android.content.ContentValues;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    EditText etID, etNumeroDeSerie, etDescripcion, etTamanio, etSistemaOperativo, etCamara, etRam;
    Button botonGuardar, botonBuscar, botonModificar, botonEliminar, botonLimpiarCampos;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        etNumeroDeSerie = (EditText)findViewById(R.id.etNumeroDeSerie);
        etDescripcion = (EditText)findViewById(R.id.etDescripcion);
        etTamanio = (EditText)findViewById(R.id.etTamanio);
        etSistemaOperativo = (EditText) findViewById(R.id.etSistemaOperativo);
        etCamara = (EditText) findViewById(R.id.etCamara);
        etRam = (EditText) findViewById(R.id.etRam);
        etID = (EditText) findViewById(R.id.etID);

        botonGuardar = (Button)findViewById(R.id.botonGuardar);
        botonBuscar = (Button)findViewById(R.id.botonBuscar);
        botonModificar = (Button)findViewById(R.id.botonModificar);
        botonEliminar = (Button)findViewById(R.id.botonEliminar);
        botonLimpiarCampos = (Button) findViewById(R.id.botonLimpiarCampos);

        final BaseDeDatos baseDeDatos = new BaseDeDatos(getApplicationContext());

        botonGuardar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                SQLiteDatabase db = baseDeDatos.getWritableDatabase();
                ContentValues valores = new ContentValues();
                valores.put("id",etID.getText().toString());
                valores.put("numeroDeSerie",etNumeroDeSerie.getText().toString());
                valores.put("descripcion", etDescripcion.getText().toString());
                valores.put("tamanio", etTamanio.getText().toString());
                valores.put("sistemaOperativo", etSistemaOperativo.getText().toString());
                valores.put("camara", etCamara.getText().toString());
                valores.put("ram", etRam.getText().toString());
                Long Guardado = db.insert("tablaMovil", "descripcion",  valores);
                Toast.makeText(getApplicationContext(),
                        "Se ingresó a "+Guardado+ etDescripcion.getText().toString(),
                        Toast.LENGTH_LONG).show();
                final TextView tvDatos = (TextView) findViewById(R.id.tvDatos);
                tvDatos.setText(baseDeDatos.LeerTodo());
                etID.setText("");
                etNumeroDeSerie.setText("");
                etDescripcion.setText("");
                etTamanio.setText("");
                etSistemaOperativo.setText("");
                etCamara.setText("");
                etRam.setText("");
            }
        });

        botonBuscar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String consulta = "";
                SQLiteDatabase db = baseDeDatos.getReadableDatabase();
                String[] lectura = {etID.getText().toString()};
                String[] projection = {"numeroDeSerie", "descripcion","tamanio","sistemaOperativo","camara","ram"};
                Cursor c = db.query("tablaMovil", projection, "id" + "=?", lectura, null, null, "id");
                c.moveToFirst();
                etNumeroDeSerie.setText(c.getString(0));
                etDescripcion.setText(c.getString(1));
                etTamanio.setText(c.getString(2));
                etSistemaOperativo.setText(c.getString(3));
                etCamara.setText(c.getString(4));
                etRam.setText(c.getString(5));
                final TextView tvDatos = (TextView) findViewById(R.id.tvDatos);
                tvDatos.setText(baseDeDatos.LeerTodo());
            }
        });

        botonModificar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                SQLiteDatabase db =baseDeDatos.getWritableDatabase();
                ContentValues valores = new ContentValues() ;
                valores.put("numeroDeSerie", etNumeroDeSerie.getText().toString());
                valores.put("descripcion", etDescripcion.getText().toString());
                valores.put("tamanio", etTamanio.getText().toString());
                valores.put("sistemaOperativo", etSistemaOperativo.getText().toString());
                valores.put("camara", etCamara.getText().toString());
                valores.put("ram", etRam.getText().toString());

                String[] lectura = {etID.getText().toString()};
                String Selection = "id"+"=?";
                db.update("tablaMovil",valores,Selection,lectura);

                final TextView tvDatos = (TextView) findViewById(R.id.tvDatos);
                tvDatos.setText(baseDeDatos.LeerTodo());
            }
        });

        botonEliminar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                SQLiteDatabase db = baseDeDatos.getWritableDatabase();
                String selection = "id" + "=?";
                String [] eliminarDatos = {etID.getText().toString()};
                db.delete("tablaMovil", selection, eliminarDatos);

                final TextView tvDatos = (TextView) findViewById(R.id.tvDatos);
                tvDatos.setText(baseDeDatos.LeerTodo());
            }
        });

        botonLimpiarCampos.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                etID.setText("");
                etNumeroDeSerie.setText("");
                etDescripcion.setText("");
                etTamanio.setText("");
                etSistemaOperativo.setText("");
                etCamara.setText("");
                etRam.setText("");
            }
        });

    }
}