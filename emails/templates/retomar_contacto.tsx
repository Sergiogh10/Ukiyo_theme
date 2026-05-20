import * as React from 'react';
import { EmailLayout } from '../components/EmailLayout';
import { Header } from '../components/Header';
import { Footer } from '../components/Footer';
import { SectionTitle } from '../components/SectionTitle';
import { Paragraph } from '../components/Paragraph';
import { SignatureBlock } from '../components/SignatureBlock';
import { CTAButton } from '../components/CTAButton';
import { Card } from '../components/Card';
import { Section } from '@react-email/components';
import { CommonEmailProps, mockCommonProps } from '../data/mockData';

export const ReengagementEmail = ({
  clientName = mockCommonProps.clientName,
  senderName = mockCommonProps.senderName,
  senderRole = mockCommonProps.senderRole,
  senderPhotoUrl = mockCommonProps.senderPhotoUrl,
  senderEmail = mockCommonProps.senderEmail,
  senderPhone = mockCommonProps.senderPhone,
  supportEmail = mockCommonProps.supportEmail,
}: CommonEmailProps) => {
  const previewText = 'Cuando volvamos a cruzarnos con otro viaje.';

  return (
    <EmailLayout previewText={previewText}>
      <Header />
      <Section style={{ padding: '0 48px' }}>
        <Card>
          <SectionTitle as="h1">Hola {clientName},</SectionTitle>
          <Paragraph>
            Hace ya un tiempo que volvisteis y esperamos que el recuerdo del viaje siga sacándoos una sonrisa de vez en cuando. 
          </Paragraph>
          <Paragraph>
            Escribimos desde UKIYO solo para saludaros y compartir con vosotros algunas ideas nuevas que hemos ido publicando. Muchas veces el siguiente viaje empieza así: leyendo algo que te despierta las ganas de volver a salir.
          </Paragraph>
          <Paragraph>
            Últimamente hemos estado preparando nuevas rutas y nuevos destinos, y hemos reunido parte de todo eso en el journal.
          </Paragraph>

          <CTAButton href="https://viajesukiyo.com/journal">
            Leer nuestros últimos artículos
          </CTAButton>

          <Paragraph>
            No hay prisa ni compromiso. Es solo una forma de seguir en contacto. Y si en algún momento os apetece volver a hacer la maleta, aquí estamos.
          </Paragraph>
          <Paragraph>
            Un abrazo muy fuerte de parte de todo el equipo de UKIYO.
          </Paragraph>

          <SignatureBlock 
            name={senderName} 
            role={senderRole} 
            photoUrl={senderPhotoUrl}
            email={senderEmail}
            phone={senderPhone}
          />
        </Card>
      </Section>
      <Footer supportEmail={supportEmail} />
    </EmailLayout>
  );
};

export default ReengagementEmail;
