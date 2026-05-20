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

export const WelcomeBackEmail = ({
  clientName = mockCommonProps.clientName,
  senderName = mockCommonProps.senderName,
  senderRole = mockCommonProps.senderRole,
  senderPhotoUrl = mockCommonProps.senderPhotoUrl,
  senderEmail = mockCommonProps.senderEmail,
  senderPhone = mockCommonProps.senderPhone,
  supportEmail = mockCommonProps.supportEmail,
}: CommonEmailProps) => {
  const previewText = 'Bienvenidos de vuelta a casa.';

  return (
    <EmailLayout previewText={previewText}>
      <Header />
      <Section style={{ padding: '0 48px' }}>
        <Card>
          <SectionTitle as="h1">Bienvenidos de vuelta, {clientName}</SectionTitle>
          <Paragraph>
            Espero de corazón que la vuelta a casa esté siendo suave. Volver siempre cuesta un poco, pero ojalá sigáis todavía con el viaje muy presente.
          </Paragraph>
          <Paragraph>
            Desde UKIYO queríamos daros las gracias por habernos dejado acompañaros en esta aventura. Para nosotros ha sido una alegría formar parte del viaje.
          </Paragraph>
          <Paragraph>
            Tomaos vuestro tiempo. Cuando os apetezca, nos encantará saber qué momentos os lleváis con más cariño y cómo habéis vivido el viaje.
          </Paragraph>
          <Paragraph>
            Hablaremos en unos días. Hasta entonces, descansad.
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

export default WelcomeBackEmail;
