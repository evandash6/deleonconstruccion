<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" bgcolor="#f0f0f0">
     <tr>
         <td align="center">
             <table role="presentation" width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff"
                 style="border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                 <!-- Encabezado -->
                 <tr>
                     <td bgcolor="#fafafa" align="center"
                         style="padding: 20px; color: white; font-size: 24px; font-weight: bold; border-radius: 8px 8px 0 0;">




                         <img src="<?=base_url()?>frontend/images/deleon-construccion.png" alt="Logo Empresa" width="250" style="display: block; margin-bottom: 10px;">


                     </td>

                 </tr>

                 <!-- Contenido -->
                 <tr>
                     <td style="padding: 20px; text-align: left; font-size: 16px; color: #333;">
                         <p><strong style="text-transform: capitalize;">DE LEON-CONSTRUCCION</strong> Agradece su contacto</p>
                         <p>El registro ha sido recibido correctamente. A continuación proporcionamos los detalles:
                         </p>


                         <ul>
                             <li><strong style="text-transform: capitalize;">Nombre: </strong><?php echo $nombre; ?>
                             </li>
                             <li><strong style="text-transform: capitalize;">Email: </strong><?php echo $correo; ?>
                             </li>
                             <li><strong style="text-transform: capitalize;">Teléfono:
                                 </strong><?php echo $telefono; ?></li>
                             <li><strong style="text-transform: capitalize;">Comentario:
                                 </strong><?php echo $comentarios; ?></li>
                         </ul>
                     </td>
                 </tr>


                 <!-- Pie de página -->
                 <tr>
                     <td bgcolor="#fd6b3e" align="center" style="padding: 10px; font-size: 14px; color: #fff;">
                         © 2025 DE LEON CONSTRUCCION
                     </td>
                 </tr>
             </table>
         </td>
     </tr>
 </table>