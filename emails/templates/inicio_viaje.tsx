import * as React from 'react';
import { EmailLayout } from '../components/EmailLayout';
import { Header } from '../components/Header';
import { Footer } from '../components/Footer';
import { SectionTitle } from '../components/SectionTitle';
import { Paragraph } from '../components/Paragraph';
import { SignatureBlock } from '../components/SignatureBlock';
import { Card } from '../components/Card';
import { Section } from '@react-email/components';
import { CommonEmailProps, mockCommonProps } from '../data/mockData';

export const TripStartEmail = ({
  clientName = mockCommonProps.clientName,
  senderName = mockCommonProps.senderName,
  senderRole = mockCommonProps.senderRole,
  senderPhotoUrl = mockCommonProps.senderPhotoUrl,
  senderEmail = mockCommonProps.senderEmail,
  senderPhone = mockCommonProps.senderPhone,
  supportEmail = mockCommonProps.supportEmail,
}: CommonEmailProps) => {
  const previewText = 'Tu viaje empieza ahora.';

  return (
    <EmailLayout previewText={previewText}>
      <Header />
      <Section style={{ padding: '0 48px' }}>
        <Card>
          <SectionTitle as="h1">¡Buen viaje, {clientName}!</SectionTitle>
          <Paragraph>
            Tanto dar pinceladas sobre el lienzo y este es el momento en el que el viaje toma sus propios colores.
          </Paragraph>
          <Paragraph>
            En UKIYO creemos firmemente que lo que hemos diseñado durante meses solo es el molde. Ahora sois vosotros quienes llenaréis los espacios en blanco, quienes haréis cambios de planes espontáneos y quienes guardaréis sensaciones que ninguna guía de viaje podría describir.
          </Paragraph>
          <Paragraph>
            Ten la tranquilidad de que seguimos muy de cerca por si cualquier cosa falla —por fortuna o por desgracia, es parte de la aventura y lo superaremos si se presenta.
          </Paragraph>
          <Paragraph>
            Nosotros volveremos a hablarnos a la vuelta, así dejamos todo el espacio del mundo para que te pierdas y te maravilles. 
          </Paragraph>
          <Paragraph>
            Deseo que sea el viaje de vuestras vidas. De verdad.
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

export default TripStartEmail;
