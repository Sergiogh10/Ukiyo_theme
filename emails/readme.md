# UKIYO Emails

Proyecto generado con `npx create-email` para maquetar y exportar emails transaccionales de UKIYO con React Email.

## Comandos

```sh
cd /Applications/XAMPP/xamppfiles/htdocs/ukiyo/wp-content/themes/ukiyo/emails
npm install
npm run dev
```

La previsualización queda disponible en [http://localhost:3000](http://localhost:3000).

## Plantillas

- `emails/primer_contacto.tsx`: email de respuesta inicial para leads interesados en un viaje a medida.

## Exportar HTML

```sh
npm run export
```

El HTML exportado se genera en `out/` para poder reutilizarlo en WordPress o en el proveedor de email que uses.

## Assets en produccion

Si necesitas que el logo salga con URL absoluta en el HTML exportado, lanza el comando con `EMAIL_ASSETS_BASE_URL`:

```sh
EMAIL_ASSETS_BASE_URL=https://viajesukiyo.com/emails npm run export
```
