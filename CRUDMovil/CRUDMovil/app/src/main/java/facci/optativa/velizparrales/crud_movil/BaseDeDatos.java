package facci.optativa.velizparrales.crud_movil;

import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import androidx.annotation.Nullable;

public class BaseDeDatos extends SQLiteOpenHelper {


    private static final String TABLE_CONTROL_DISPOSITIVO =
            "CREATE TABLE  tablaMovil (id text, numeroDeSerie text,  descripcion text, tamanio text, sistemaOperativo text, camara text, ram text)";

    public static final int DATABASE_VERSION = 1;
    public static final String DATABASE_NAME = "MiBasedeDatos.db";


    public BaseDeDatos(Context context) {
        super(context, DATABASE_NAME, null,  DATABASE_VERSION);
    }

    public BaseDeDatos(@Nullable Context context, @Nullable String name, @Nullable SQLiteDatabase.CursorFactory factory, int version) {
        super(context, name, factory, version);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL( TABLE_CONTROL_DISPOSITIVO);

    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL("DROP TABLE IF EXISTS tablaMovil");
        onCreate(db);
    }


    public String LeerTodo() {

        String consulta = "";
        Cursor cursor = this.getReadableDatabase().rawQuery("SELECT * FROM tablaMovil", null);
        if (cursor.moveToFirst()){
            do{
                String idV = cursor.getString(cursor.getColumnIndex("id"));
                String numeroDeSerieV = cursor.getString(cursor.getColumnIndex("numeroDeSerie"));
                String descripcionV = cursor.getString(cursor.getColumnIndex("descripcion"));
                String tamanioV = cursor.getString(cursor.getColumnIndex("tamanio"));
                String sistemaOperativoV = cursor.getString(cursor.getColumnIndex("sistemaOperativo"));
                String camaraV = cursor.getString(cursor.getColumnIndex("camara"));
                String ramV = cursor.getString(cursor.getColumnIndex("ram"));

                consulta += "N. Serie: " + numeroDeSerieV + "  |  Des: " + descripcionV + "  |  Tamaño:" + tamanioV + "  |  SO: " + sistemaOperativoV + "  |  Cámara: " + camaraV + "  |  RAM: " + ramV + "\n";
            }while (cursor.moveToNext());
        }
        return consulta;
    }
}
